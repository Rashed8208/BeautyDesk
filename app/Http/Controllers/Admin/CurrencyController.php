<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::orderByDesc('is_default')
            ->orderBy('name')
            ->paginate(10);

        return view('Table.currencies.index', compact('currencies'));
    }

    public function create()
    {
        return view('Table.currencies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],
            'code' => [
                'required',
                'string',
                'max:10',
                'unique:currencies,code',
            ],
            'symbol' => [
                'required',
                'string',
                'max:10',
            ],
            'exchange_rate' => [
                'required',
                'numeric',
                'min:0',
            ],
            'is_default' => [
                'nullable',
                'boolean',
            ],
            'status' => [
                'required',
                Rule::in(['active', 'inactive']),
            ],
        ]);

        DB::transaction(function () use ($validated) {

            $isDefault = (bool) ($validated['is_default'] ?? false);

            if ($isDefault) {
                Currency::query()->update([
                    'is_default' => false,
                ]);
            }

            Currency::create([
                'name' => $validated['name'],
                'code' => strtoupper($validated['code']),
                'symbol' => $validated['symbol'],
                'exchange_rate' => $validated['exchange_rate'],
                'is_default' => $isDefault,
                'status' => $validated['status'],
            ]);
        });

        return redirect()
            ->route('admin.currencies.index')
            ->with('success', 'Currency added successfully.');
    }

    public function edit(Currency $currency)
    {
        return view('Table.currencies.edit', compact('currency'));
    }

    public function update(Request $request, Currency $currency)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],
            'code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('currencies', 'code')->ignore($currency->id),
            ],
            'symbol' => [
                'required',
                'string',
                'max:10',
            ],
            'exchange_rate' => [
                'required',
                'numeric',
                'min:0',
            ],
            'is_default' => [
                'nullable',
                'boolean',
            ],
            'status' => [
                'required',
                Rule::in(['active', 'inactive']),
            ],
        ]);

        DB::transaction(function () use ($validated, $currency) {

            $isDefault = (bool) ($validated['is_default'] ?? false);

            if ($isDefault) {
                Currency::where('id', '!=', $currency->id)
                    ->update([
                        'is_default' => false,
                    ]);
            }

            $currency->update([
                'name' => $validated['name'],
                'code' => strtoupper($validated['code']),
                'symbol' => $validated['symbol'],
                'exchange_rate' => $validated['exchange_rate'],
                'is_default' => $isDefault,
                'status' => $validated['status'],
            ]);
        });

        return redirect()
            ->route('admin.currencies.index')
            ->with('success', 'Currency updated successfully.');
    }

    public function destroy(Currency $currency)
    {
        if ($currency->is_default) {
            throw ValidationException::withMessages([
                'currency' => 'Default currency cannot be deleted.',
            ]);
        }

        $currency->delete();

        return redirect()
            ->route('admin.currencies.index')
            ->with('success', 'Currency deleted successfully.');
    }
}