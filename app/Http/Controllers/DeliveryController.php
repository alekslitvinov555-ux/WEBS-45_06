<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        $product = $request->product_id 
            ? Product::findOrFail($request->product_id)
            : $products->first();

        // Базовые порты
        $ports = [
            'NY' => ['label' => 'New York', 'sea' => 1200, 'distance' => 400],
            'LA' => ['label' => 'Los Angeles', 'sea' => 1500, 'distance' => 600],
            'MIA' => ['label' => 'Miami', 'sea' => 1100, 'distance' => 300],
        ];

        // Типы кузова
        $bodyTypes = [
            'sedan' => ['label' => 'Sedan', 'coef' => 1.0],
            'suv'   => ['label' => 'SUV', 'coef' => 1.2],
            'truck' => ['label' => 'Pickup', 'coef' => 1.4],
        ];

        return view('delivery.index', compact('products', 'product', 'ports', 'bodyTypes'));
    }
}
