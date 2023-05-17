<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest, Product $product)
    {
        $data = $updateRequest->validated();
        //$data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        if (isset($data['tags'])) {
            $tagsIds = $data['tags'];
        }
        else{
            $tagsIds = null;
        }

        $product->tags()->sync($tagsIds);

        if (isset($data['colors'])) {
            $colorsIds = $data['colors'];
        }
        else{
            $colorsIds = null;
        }
        $product->colors()->sync($colorsIds);

        unset($data['tags'], $data['colors']);
        $product->update($data);

        return redirect()->route('product.index');
    }


}
