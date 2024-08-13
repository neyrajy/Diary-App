<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fee;

class FeesController extends Controller
{
    // Display a listing of fees
    public function index()
    {
        $fees = Fee::all();
        return view('fees.index', compact('fees'));
    }

    // Show the form for creating a new fee
    public function create()
    {
        return view('fees.create');
    }

    // Store a newly created fee in the database
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'due_date' => 'required|date',
        ]);

        Fee::create($request->all());

        return redirect()->route('fees.index')->with('success', 'Fee created successfully.');
    }

    // Show the form for editing a fee
    public function edit($id)
    {
        $fee = Fee::findOrFail($id);
        return view('fees.edit', compact('fee'));
    }

    // Update the specified fee in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $fee = Fee::findOrFail($id);
        $fee->update($request->all());

        return redirect()->route('fees.index')->with('success', 'Fee updated successfully.');
    }

    // Remove the specified fee from the database
    public function destroy($id)
    {
        $fee = Fee::findOrFail($id);
        $fee->delete();

        return redirect()->route('fees.index')->with('success', 'Fee deleted successfully.');
    }
}

