<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest, Product $product)
    {
        $data = $updateRequest->validated();
        $product->update($data);

        return view('product.show', compact('product'));
    }
}
