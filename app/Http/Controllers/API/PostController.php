<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at')->get();
        return response()->json(['posts'=>$posts])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        if ($request->has('titulo') && $request->has('texto') && $request->has('publicado')){
            $post->titulo = $request->titulo;
            $post->texto = $request->texto;
            $post->publicado = $request->publicado;
            $post->save();
            return response()->json($post)->setStatusCode(Response::HTTP_OK);
        } else {
            return response()->json("Error. Falta algún parámetro")->setStatusCode(Response::HTTP_BAD_REQUEST );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
