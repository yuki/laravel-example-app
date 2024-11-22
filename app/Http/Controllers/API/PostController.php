<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
* @OA\Info(title="API", version="1.0"),
* @OA\SecurityScheme(
*     in="header",
*     scheme="bearer",
*     bearerFormat="JWT",
*     securityScheme="bearerAuth",
*     type="http",
* ),
*/

class PostController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/posts",
    *     summary="Mostrar posts",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los posts."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function index()
    {
        $posts = Post::orderBy('created_at')->get();
        return response()->json(['posts'=>$posts])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
    * @OA\Post(
    *     path="/api/posts",
    *     summary="Create a post",
    *     @OA\Parameter(
    *         name="titulo",
    *         in="query",
    *         description="Titulo del post",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         name="texto",
    *         in="query",
    *         description="Texto del post",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         name="publicado",
    *         in="query",
    *         description="Si está publicado o no",
    *         required=true,
    *         @OA\Schema(
    *             type="boolean"
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="successful operation",
    *         @OA\JsonContent(
    *             type="string"
    *         ),
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Unauthenticated"
    *     ),
    *     security={
        *         {"bearerAuth": {}}
        *     }
    * )
    */
    public function store(Request $request)
    {
        $post = new Post();
        if ($request->has('titulo') && $request->has('texto') && $request->has('publicado')){
            $post->titulo = $request->titulo;
            $post->texto = $request->texto;
            $post->publicado = json_decode($request->publicado);
            $post->save();
            return response()->json($post)->setStatusCode(Response::HTTP_OK);
        } else {
            return response()->json("Error. Falta algún parámetro")->setStatusCode(Response::HTTP_BAD_REQUEST );
        }
    }

    /**
    * @OA\Get(
    *     path="/api/posts/{id}",
    *     summary="Mostrar un post concreto",
    *     @OA\Parameter(
    *          name="id",
    *          description="Project id",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar el post especificado."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function show(Post $post)
    {
        return response()->json($post)->setStatusCode(Response::HTTP_OK);
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
