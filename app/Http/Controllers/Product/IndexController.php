<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        $colors = Color::all();


        $categories = Category::all();
        $tags = Tag::all();
        return view('product.index', compact('products', 'categories', 'tags', 'colors'));
    }
}
