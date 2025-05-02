<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $limit = request()->query('limit', 10);
        $products = [
            (object) [
                "id" => 1,
                "name" => "Sapu",
                "description" => "Ini sapu murah",
                "price" => 10000,
            ],
            (object) [
                "id" => 2,
                "name" => "Kemonceng",
                "description" => "Ini kemonceng",
                "price" => 18000,
            ],
        ];

        if ($limit < 2) { // misalnya limit nya value nya 1
            return [
                (object) [
                    "name" => "Sapu",
                    "description" => "Ini sapu murah",
                    "price" => 10000,
                ],
            ];
        }

        return $products;
    }

    public function show($productId)
    {
        $products = [
            (object) [
                "id" => 1,
                "name" => "Sapu",
                "description" => "Ini sapu murah",
                "price" => 10000,
            ],
            (object) [
                "id" => 2,
                "name" => "Kemonceng",
                "description" => "Ini kemonceng",
                "price" => 18000,
            ],
        ];

        $filteredProducts = array_filter($products, function ($product) use ($productId) {
            return $product->id == $productId;
        });

        return $filteredProducts;
    }

    public function store(Request $request)
    {
        if (
            $request->input('name') == null
        ) {
            return "Nama produk harus diisi";
        }

        $product = [
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "price" => (int) $request->input('price'),
        ];

        return $product;
    }
}
