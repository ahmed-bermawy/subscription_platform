<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use App\Traits\jsonApiTrait;

class SubscriberController extends Controller
{
    use jsonApiTrait;
    /**
     * @OA\Post(path="/api/subscribe",
     *   tags={"Subscribe"},
     *   summary="Create new post",
     *   description="This can create new post",
     *   operationId="createUser",
     *   @OA\RequestBody(
     *       required=true,
     *      description="Pass user credentials",
     *      @OA\JsonContent(
     *          required={"first_name","last_name","email","website_id"},
     *          @OA\Property(property="first_name", type="string",  example="ahmed"),
     *          @OA\Property(property="last_name", type="string",  example="bermawy"),
     *          @OA\Property(property="email", type="email", example="admin@example.com"),
     *          @OA\Property(property="website_id", type="integer", example="[1]"),
     *      ),
     *     ),
     *      @OA\Response(response="default", description="successful operation")
     * ),
     */
    public function add(SubscriberRequest $request)
    {
        $subscribe = Subscriber::updateOrCreate($request->except('website_id'));
        $website_id = $request->get('website_id');
        $subscribe->websites()->Sync($website_id);

        return $this->apiResponse(200, $subscribe->websites, 'Subscribe Added successfully ', '');
    }
}
