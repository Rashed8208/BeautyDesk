<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\StockMovement;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('supplier')
            ->latest()
            ->paginate(10);

        return view('Table.purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::where('status', 'active')
            ->orderBy('name')
            ->get();

        $products = Product::orderBy('name')->get();

        return view(
            'Table.purchases.create',
            compact('suppliers', 'products')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => [
                'required',
                'exists:suppliers,id',
            ],
            'purchase_date' => [
                'required',
                'date',
            ],
            'invoice_no' => [
                'nullable',
                'string',
                'max:100',
            ],
            'notes' => [
                'nullable',
                'string',
            ],
            'items' => [
                'required',
                'array',
                'min:1',
            ],
            'items.*.product_id' => [
                'required',
                'exists:products,id',
            ],
            'items.*.quantity' => [
                'required',
                'numeric',
                'min:1',
            ],
            'items.*.purchase_price' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        DB::transaction(function () use ($validated) {

            $totalAmount = 0;

            foreach ($validated['items'] as $item) {
                $totalAmount +=
                    $item['quantity'] * $item['purchase_price'];
            }

            $purchase = Purchase::create([
                'supplier_id' => $validated['supplier_id'],
                'purchase_date' => $validated['purchase_date'],
                'invoice_no' => $validated['invoice_no'] ?? null,
                'total_amount' => $totalAmount,
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($validated['items'] as $item) {

                $quantity = $item['quantity'];
                $purchasePrice = $item['purchase_price'];
                $subtotal = $quantity * $purchasePrice;

                $purchase->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $quantity,
                    'purchase_price' => $purchasePrice,
                    'subtotal' => $subtotal,
                ]);

                $product = Product::lockForUpdate()
                    ->findOrFail($item['product_id']);

                $stockBefore = $product->stock ?? 0;
                $stockAfter = $stockBefore + $quantity;

                $product->update([
                    'stock' => $stockAfter,
                ]);

                StockMovement::create([
                    'product_id' => $product->id,
                    'type' => 'purchase',
                    'quantity' => $quantity,
                    'stock_before' => $stockBefore,
                    'stock_after' => $stockAfter,
                    'reference_type' => Purchase::class,
                    'reference_id' => $purchase->id,
                    'note' => 'Stock increased from purchase.',
                ]);
            }
        });

        return redirect()
            ->route('admin.purchases.index')
            ->with('success', 'Purchase added and stock updated successfully.');
    }

    public function show(Purchase $purchase)
    {
        $purchase->load([
            'supplier',
            'items.product',
        ]);

        return view(
            'Table.purchases.show',
            compact('purchase')
        );
    }

    public function edit(Purchase $purchase)
    {
        $purchase->load('items');

        $suppliers = Supplier::where('status', 'active')
            ->orderBy('name')
            ->get();

        $products = Product::orderBy('name')->get();

        return view(
            'Table.purchases.edit',
            compact(
                'purchase',
                'suppliers',
                'products'
            )
        );
    }

    public function update(Request $request, Purchase $purchase)
    {
        $validated = $request->validate([
            'supplier_id' => [
                'required',
                'exists:suppliers,id',
            ],
            'purchase_date' => [
                'required',
                'date',
            ],
            'invoice_no' => [
                'nullable',
                'string',
                'max:100',
            ],
            'notes' => [
                'nullable',
                'string',
            ],
            'items' => [
                'required',
                'array',
                'min:1',
            ],
            'items.*.product_id' => [
                'required',
                'exists:products,id',
            ],
            'items.*.quantity' => [
                'required',
                'numeric',
                'min:1',
            ],
            'items.*.purchase_price' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        DB::transaction(function () use ($validated, $purchase) {

            $oldItems = $purchase->items()
                ->lockForUpdate()
                ->get();

            foreach ($oldItems as $oldItem) {

                $product = Product::lockForUpdate()
                    ->findOrFail($oldItem->product_id);

                $stockBefore = $product->stock ?? 0;
                $stockAfter = $stockBefore - $oldItem->quantity;

                if ($stockAfter < 0) {
                    throw ValidationException::withMessages([
                        'items' =>
                            'Purchase cannot be updated because stock would become negative.',
                    ]);
                }

                $product->update([
                    'stock' => $stockAfter,
                ]);

                StockMovement::create([
                    'product_id' => $product->id,
                    'type' => 'purchase_reversal',
                    'quantity' => -$oldItem->quantity,
                    'stock_before' => $stockBefore,
                    'stock_after' => $stockAfter,
                    'reference_type' => Purchase::class,
                    'reference_id' => $purchase->id,
                    'note' => 'Previous purchase stock reversed during update.',
                ]);
            }

            $purchase->items()->delete();

            $totalAmount = 0;

            foreach ($validated['items'] as $item) {
                $totalAmount +=
                    $item['quantity'] * $item['purchase_price'];
            }

            $purchase->update([
                'supplier_id' => $validated['supplier_id'],
                'purchase_date' => $validated['purchase_date'],
                'invoice_no' => $validated['invoice_no'] ?? null,
                'total_amount' => $totalAmount,
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($validated['items'] as $item) {

                $quantity = $item['quantity'];
                $purchasePrice = $item['purchase_price'];
                $subtotal = $quantity * $purchasePrice;

                $purchase->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $quantity,
                    'purchase_price' => $purchasePrice,
                    'subtotal' => $subtotal,
                ]);

                $product = Product::lockForUpdate()
                    ->findOrFail($item['product_id']);

                $stockBefore = $product->stock ?? 0;
                $stockAfter = $stockBefore + $quantity;

                $product->update([
                    'stock' => $stockAfter,
                ]);

                StockMovement::create([
                    'product_id' => $product->id,
                    'type' => 'purchase',
                    'quantity' => $quantity,
                    'stock_before' => $stockBefore,
                    'stock_after' => $stockAfter,
                    'reference_type' => Purchase::class,
                    'reference_id' => $purchase->id,
                    'note' => 'Stock increased from updated purchase.',
                ]);
            }
        });

        return redirect()
            ->route('admin.purchases.index')
            ->with('success', 'Purchase updated and stock adjusted successfully.');
    }

    public function destroy(Purchase $purchase)
    {
        DB::transaction(function () use ($purchase) {

            $items = $purchase->items()
                ->lockForUpdate()
                ->get();

            foreach ($items as $item) {

                $product = Product::lockForUpdate()
                    ->findOrFail($item->product_id);

                $stockBefore = $product->stock ?? 0;
                $stockAfter = $stockBefore - $item->quantity;

                if ($stockAfter < 0) {
                    throw ValidationException::withMessages([
                        'purchase' =>
                            'Purchase cannot be deleted because stock would become negative.',
                    ]);
                }

                $product->update([
                    'stock' => $stockAfter,
                ]);

                StockMovement::create([
                    'product_id' => $product->id,
                    'type' => 'purchase_reversal',
                    'quantity' => -$item->quantity,
                    'stock_before' => $stockBefore,
                    'stock_after' => $stockAfter,
                    'reference_type' => Purchase::class,
                    'reference_id' => $purchase->id,
                    'note' => 'Stock reduced because purchase was deleted.',
                ]);
            }

            $purchase->items()->delete();
            $purchase->delete();
        });

        return redirect()
            ->route('admin.purchases.index')
            ->with('success', 'Purchase deleted and stock adjusted successfully.');
    }
}