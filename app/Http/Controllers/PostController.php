<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGroups()
    {
        $groups = Group::all();

        return response()->json([
            'groups' => $groups
        ], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $posts = Post::with('group')->where('group_id', $id)->limit(10)->orderBy('id', 'DESC')->get();

        if ($posts) {
            return response()->json([
                'posts' => $posts,
            ], 200);
        }

        return response()->json([
            'message' => 'Posts not found!'
        ], 404);
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(PostRequest $request)
    {
        $post = $request->all();
        $created_post = Post::create($post);

        if ($created_post) {
            return response()->json([
                'message' => 'Post added successfully!'
            ], 200);
        }

        return response()->json([
            'message' => 'Post not added!'
        ], 404);
    }
}
