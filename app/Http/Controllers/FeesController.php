<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    //
    public function post_fees(Request $request){
        $feesDetails = $request->validate([
            'student_id' => 'required|integer',
            'type' => 'required|string',
            'receipt' => 'nullable|image|max:2048',
            'status' => 'required|string',
            'due_date' => 'nullable',
            'paid_date' => 'nullable',
            'description' => 'required|string|max:255',
        ]);

        if($request->hasFile('receipt')){
            $feesDetails['receipt'] = $request->file('receipt')->store('receipts','public');
        }

        Fee::create($feesDetails);

        dd($request);

        // return redirect()->back()->with('success_uploads','Posted successfully');
    }
}
