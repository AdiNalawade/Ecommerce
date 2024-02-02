<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variant;

class ProductController extends Controller
{
    public function index()
    {
        
        return Product::with('variants')->get();
    }

    public function show($id)
    {
        return Product::with('variants')->find($id);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        if ($request->has('variants')) {
            $product->variants()->createMany($request->variants);
        }

        return response()->json($product, 201);
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        if ($request->has('variants')) {
            $product->variants()->delete();
            $product->variants()->createMany($request->variants);
        }

        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->orWhereHas('variants', function ($variantQuery) use ($query) {
                $variantQuery->where('name', 'LIKE', "%$query%");
            })
            ->with('variants')
            ->get();

        return response()->json($products, 200);
    }
}
