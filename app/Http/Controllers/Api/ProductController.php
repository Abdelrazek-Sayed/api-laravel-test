<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }


    public function  Product($id)
    {
        $product = Product::findOrfail($id);

        return new ProductResource($product);
    }
}
