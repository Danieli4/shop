<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest)
    {
        //dd($storeRequest);
        $data = $storeRequest->validated();
        Product::firstOrCreate([
            'email' => $data['email']
        ],$data);

        return redirect()->route('product.index');
    }
}
