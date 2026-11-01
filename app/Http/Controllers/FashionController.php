<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FashionController extends Controller
{
    private array $collections = [
        'sarees' => [
            'name' => 'Sarees',
            'category' => 'Sarees',
            'subtitle' => 'Timeless elegance for every occasion.',
            'description' => 'Explore our beautiful saree collection.',
        ],

        'kurtis' => [
            'name' => 'Kurtis',
            'category' => 'Kurtis',
            'subtitle' => 'Everyday style, effortlessly elegant.',
            'description' => 'Discover stylish kurtis for every day.',
        ],

        'abayas-burqas' => [
            'name' => 'Abayas & Burqas',
            'category' => 'Abayas & Burqas',
            'subtitle' => 'Modest fashion with timeless grace.',
            'description' => 'Explore elegant abayas and burqas.',
        ],

        'three-piece-suits' => [
            'name' => 'Three-Piece Suits',
            'category' => 'Three-Piece Suits',
            'subtitle' => 'Beautiful outfits for every celebration.',
            'description' => 'Discover our three-piece suit collection.',
        ],
    ];

    public function index(Request $request, string $slug): View
    {
        abort_unless(isset($this->collections[$slug]), 404);

        $collection = $this->collections[$slug];

        $category = Category::where(
            'name',
            $collection['category']
        )->first();

        $products = Product::query()
            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category->id);
            }, function ($query) {
                $query->whereRaw('1 = 0');
            })
            ->when($request->filled('min_price'), function ($query) use ($request) {
                $query->whereRaw(
                    'COALESCE(sale_price, price) >= ?',
                    [(float) $request->min_price]
                );
            })
            ->when($request->filled('max_price'), function ($query) use ($request) {
                $query->whereRaw(
                    'COALESCE(sale_price, price) <= ?',
                    [(float) $request->max_price]
                );
            })
            ->when($request->input('sort') === 'price_low', function ($query) {
                $query->orderByRaw('COALESCE(sale_price, price) ASC');
            })
            ->when($request->input('sort') === 'price_high', function ($query) {
                $query->orderByRaw('COALESCE(sale_price, price) DESC');
            })
            ->when(!in_array($request->input('sort'), ['price_low', 'price_high']), function ($query) {
                $query->latest();
            })
            ->paginate(12)
            ->withQueryString();

        return view('fashion.category', compact(
            'collection',
            'products',
            'slug'
        ));
    }
}
