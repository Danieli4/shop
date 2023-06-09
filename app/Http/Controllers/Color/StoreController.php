<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest)

    {
        $data = $storeRequest->validated();
        Color::firstOrCreate($data);

        return redirect()->route('color.index');
    }
}
