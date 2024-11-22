<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\FeeType;
use App\Models\SClass;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use NumberFormatter;

class FeesController extends Controller
{
    function numberToWords($number)
        {
        $dictionary = [
            0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
            5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
            14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen',
            18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy',
            80 => 'eighty', 90 => 'ninety'
        ];
    
        if ($number < 20) {
            return $dictionary[$number];
        } elseif ($number < 100) {
            $tens = (int)($number / 10) * 10;
            $units = $number % 10;
            return $units === 0 ? $dictionary[$tens] : $dictionary[$tens] . '-' . $dictionary[$units];
        } else {
            return "Number too large.";
        }
    }    
    public function index()
    {
        $students = Student::all();
        $fees = Fee::with(['student', 'feeType'])->get();
        return view('admin.fees.index', compact('fees','students'));
    }

    public function create()
    {
        $feeTypes = FeeType::all();
        $classes = SClass::all();
        $sections = Section::all();
        $students = Student::all();
        return view('admin.fees.create', compact('feeTypes','classes', 'sections', 'students' ));
    }
    // public function show($id)
    // {
    //     $fee = Fee::findOrFail($id);
    //     return view('admin.fees.show', compact('fee'));
    // }

    public function showSingle($id)
    {
        $fees = Fee::where('student_id', $id)->get();
        $student = Student::findOrFail($id);
        return view('admin.fees.show', compact('student','fees'));
    }

    public function edit($id)
    {
        $fee = Fee::findOrFail($id);
        $students = Student::all();
        $feeTypes = FeeType::all();
    
        return view('admin.fees.edit', compact('fee', 'students', 'feeTypes'));
    }
    
    public function update(Request $request, $id)
    {
        $fee = Fee::findOrFail($id);
        $fee->student_id = $request->student_id;
        $fee->fee_type_id = $request->fee_type_id;
        $fee->paid_amount = $request->paid_amount;
        $fee->due_date = $request->due_date;
        $fee->paid_date = $request->paid_date;
    
        // Calculate the remaining balance
        $remaining_balance = $fee->feeType->amount - $fee->paid_amount;

        // Set status based on the remaining balance
        if ($remaining_balance <= 0) {
            $fee->status = 'paid'; // Fee is fully paid
        } elseif ($remaining_balance < $fee->feeType->amount) {
            $fee->status = 'partial'; // Some amount has been paid
        } else {
            $fee->status = 'unpaid'; // No payment or less than the total fee
        }

    
        $fee->save();
    
        return redirect()->route('admin.fees.index')->with('success', 'Fee updated successfully');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_type_id' => 'required|exists:fee_types,id',
            'paid_amount' => 'required|numeric|min:0',
            'paid_date' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:paid_date',
        ]);

        $validated['status'] = $validated['paid_amount'] >= FeeType::find($validated['fee_type_id'])->amount ? 'paid' : 'partial';

        Fee::create($validated);

        return redirect()->route('admin.fees.index')->with('success', 'Fee record created successfully.');
    }


    public function destroy(Fee $fee)
    {
        // Delete the fee record
        $fee->delete();

        // Redirect back to the fees index with a success message
        return redirect()->route('admin.fees.index')
                        ->with('success', 'Fee deleted successfully!');
    }
    public function receipt(Fee $fee)
    {
        $fee = Fee::with('student', 'feeType')->findOrFail($fee->id);
        $numberInWords = $this->numberToWords($fee->paid_amount);

        return view('admin.fees.receipt', compact('fee', 'numberInWords'));
    }
}
