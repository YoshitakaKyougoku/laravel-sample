<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        try{
            $result = Post::Visible(request('post'))->orderBy('id', 'desc')->offset(0);
            $result = $result->limit(50)->get();
            $res = [];
            foreach ($result as $post) {
                $tmp = [
                    'id' => $post->id,
                    'name' => $post->content,
                    'color' => $post->color,
                ];
                $res[] = $tmp;
            }
            return response()->json([
                'posts' => $res,
            ]);
        } catch(\Exception $e){
            return response([], 500);
        }
    }
}
