<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest, Tag $tag)
    {
        $data = $updateRequest->validated();
        $tag->update($data);

        return view('tag.show', compact('tag'));
    }
}
