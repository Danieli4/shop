<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest, Color $color)
    {
        $data = $updateRequest->validated();
        $color->update($data);

        return view('color.show', compact('color'));
    }
}
