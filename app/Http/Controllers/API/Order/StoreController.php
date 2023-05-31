<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Order\OrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Psy\debug;

class StoreController extends Controller
{
    public function __invoke(OrderRequest $orderRequest)
    {
        $data = $orderRequest->validated();


        $password = Hash::make('123123123');
        $user = User::firstOrCreate([
            'email' => $data['email'],
        ],[
            'name' => $data['name'],
            'address' => $data['address'],
            'password' =>  $password,
        ]);
        $order = Order::create([
            'products' => json_encode($data['products']),
            'user_id' => $user->id,
            'total_price'=>$data['total_price']
        ]);


        return new OrderResource($order);
    }
}
