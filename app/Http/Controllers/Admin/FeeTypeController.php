<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeType;
use App\Models\SClass;

class FeeTypeController extends Controller
{
    public function index()
    {
        $feeTypes = FeeType::all();
        return view('admin.fee_types.index', compact('feeTypes'));
    }

    public function create()
    {
        $classes = SClass::all();
        return view('admin.fee_types.create', compact('classes' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'term_fee_1' => 'nullable|numeric',
            'term_fee_2' => 'nullable|numeric',
            'term_fee_3' => 'nullable|numeric',
            'term_fee_4' => 'nullable|numeric',
        ]);

        // Calculate the annual fee if not provided
        $annualFee = $request->annual_fee ?: ($request->term_fee_1 + $request->term_fee_2 + $request->term_fee_3 + $request->term_fee_4);

        FeeType::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'annual_fee' => $annualFee,
            'term_fee_1' => $request->term_fee_1,
            'term_fee_2' => $request->term_fee_2,
            'term_fee_3' => $request->term_fee_3,
            'term_fee_4' => $request->term_fee_4,
        ]);

        return redirect()->route('admin.fee-types.index');
    }

    public function edit(FeeType $feeType)
    {
        return view('admin.fee_types.edit', compact('feeType'));
    }

    public function update(Request $request, FeeType $feeType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'term_fee_1' => 'nullable|numeric',
            'term_fee_2' => 'nullable|numeric',
            'term_fee_3' => 'nullable|numeric',
            'term_fee_4' => 'nullable|numeric',
        ]);

        $annualFee = $request->annual_fee ?: ($request->term_fee_1 + $request->term_fee_2 + $request->term_fee_3 + $request->term_fee_4);

        $feeType->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'annual_fee' => $annualFee,
            'term_fee_1' => $request->term_fee_1,
            'term_fee_2' => $request->term_fee_2,
            'term_fee_3' => $request->term_fee_3,
            'term_fee_4' => $request->term_fee_4,
        ]);

        return redirect()->route('admin.fee-types.index');
    }
    public function destroy(FeeType $feeType)
    {
        // Perform the deletion
        $feeType->delete();

        // Redirect back to the list of fee types with a success message
        return redirect()->route('admin.fee-types.index')
                         ->with('success', 'Fee type deleted successfully!');
    }
}
