<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $category = Category::find($product->category_id)->title;
        $colors = Color::find(ColorProduct::where('product_id', '=', $product->id)->get());
        $findsTags = ProductTag::where('product_id', '=', $product->id)->get();
        $tags =[];
        foreach ($findsTags as $findsTag) {
            $tags [] = Tag::find($findsTag->tag_id);
        }




        return view('product.show', compact('product', 'category', 'colors', 'tags'));
    }
}
