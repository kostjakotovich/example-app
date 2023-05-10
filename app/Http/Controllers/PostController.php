<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $inputFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $inputFields['title'] = strip_tags($inputFields['title']);
        $inputFields['body'] = strip_tags($inputFields['body']);
        $inputFields['user_id'] = auth()->id();
        Post::create($inputFields);
        return redirect('/');
    }
}
