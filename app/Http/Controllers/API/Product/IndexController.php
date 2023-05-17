<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use function Psy\debug;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();



        $filter=app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        //dump($filter);
        $products = Product::filter($filter)->paginate(12, ['*'], 'page', $data['page']);
        return IndexProductResource::collection($products);
    }
}
