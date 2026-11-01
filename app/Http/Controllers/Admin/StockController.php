<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));

        $totalProducts = Product::count();

        $totalStock = Product::sum('stock');

        $lowStockCount = Product::where('stock', '>', 0)
            ->where('stock', '<=', 10)
            ->count();

        $outOfStockCount = Product::where('stock', '<=', 0)
            ->count();

        $products = Product::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return view('Table.stock.index')
            ->with('products', $products)
            ->with('search', $search)
            ->with('totalProducts', $totalProducts)
            ->with('totalStock', $totalStock)
            ->with('lowStockCount', $lowStockCount)
            ->with('outOfStockCount', $outOfStockCount);
    }

    public function history(Request $request)
    {
        $search = trim((string) $request->input('search', ''));

        $movements = StockMovement::with('product')
            ->when($search !== '', function ($query) use ($search) {
                $query->whereHas('product', function ($productQuery) use ($search) {
                    $productQuery->where(
                        'name',
                        'like',
                        '%' . $search . '%'
                    );
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('Table.stock.history')
            ->with('movements', $movements)
            ->with('search', $search);
    }

    public function show(Product $product)
    {
        $movements = StockMovement::with('product')
            ->where('product_id', $product->id)
            ->latest()
            ->paginate(20);

        return view('Table.stock.show')
            ->with('product', $product)
            ->with('movements', $movements);
    }
}