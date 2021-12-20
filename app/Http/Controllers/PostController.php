<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Jobs\SendMail;
use App\Models\Post;
use App\Traits\jsonApiTrait;
use Illuminate\Http\Response;

/**
 * @OA\Tag(
 *   name="Post",
 *   description="Post API"
 * )
 */
class PostController extends Controller
{
    use jsonApiTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return Response
     */

    /**
     * @OA\Post(path="/api/post",
     *   tags={"Post"},
     *   summary="Create new post",
     *   description="This can create new post",
     *   operationId="createUser",
     *   @OA\RequestBody(
     *       required=true,
     *      description="Pass user credentials",
     *      @OA\JsonContent(
     *          required={"title","description","notify","website_id"},
     *          @OA\Property(property="title", type="string",  example="this is fake post title"),
     *          @OA\Property(property="description", type="string",  example="this is fake post description"),
     *          @OA\Property(property="notify", type="boolean"),
     *          @OA\Property(property="website_id", type="integer", example="1"),
     *      ),
     *     ),
     *      @OA\Response(response="default", description="successful operation")
     * ),
     */
    public function create(PostRequest $request)
    {
        $post = Post::create($request->all());
        if ($post) {
//            $subscribers = $post->website->Subscribers; //Retrieving all subscribers
            if ($post->notify == 1) {
                $this->dispatch(new SendMail($post));
            }
            return $this->apiResponse(200, $post, 'Post Created Successfully');
        }
    }

    /**
     * @OA\Get(
     *     tags={"Post"},
     *     path="/api/post/{post}",
     *     @OA\Parameter(
     *     name="post",
     *     description="post id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *     response=200,
     *     description="view post ",
     *     ),
     *     @OA\Response(
     *     response=404,
     *     description="No post found",
     *     )
     * )
     */
    public function show(Post $post)
    {
        return $this->apiResponse(200, $post);

    }
}
