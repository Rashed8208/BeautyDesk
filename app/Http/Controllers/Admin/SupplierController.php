<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);

        return view('Table.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('Table.suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'phone'        => 'required|string|max:30',
            'address'      => 'nullable|string',
            'status'       => ['required', Rule::in(['active', 'inactive'])],
        ]);

        Supplier::create($validated);

        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier added successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('Table.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'phone'        => 'required|string|max:30',
            'address'      => 'nullable|string',
            'status'       => ['required', Rule::in(['active', 'inactive'])],
        ]);

        $supplier->update($validated);

        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        if ($supplier->purchases()->exists()) {
            return redirect()
                ->route('admin.suppliers.index')
                ->with('error', 'Cannot delete a supplier with purchase records.');
        }

        $supplier->delete();

        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier deleted successfully.');
    }
}