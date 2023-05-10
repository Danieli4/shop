<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $categories = Category::all();
        $category = Category::find($product->category_id)->title;
        $tags = Tag::all();
        $colors = Color::all();
        $groups = Group::all();
        return view('product.edit', compact('product', 'category', 'categories', 'tags', 'colors', 'groups'));
    }
}
