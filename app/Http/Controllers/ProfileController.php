<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{



    /**
     *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/comment/{uuid}",
     *     operationId="/comment",
     * @OA\Parameter(
     *         name="entity_uuid",
     *         in="path",
     *         description="The uuid of the entity",
     *         required=true,
     *         @OA\Schema(type="string")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns all the entity comments",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    public function getProfileByid($id) {
            return Profile::findOrFail($id);
    }

    /**
     * @OA\Get(
     *     path="/comment",
     *     operationId="/comment",
     *     @OA\Response(
     *         response="200",
     *         description="Returns all comments as an array of Comments object",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */

    public function getAllProfile (){
        return response()->json(Profile::all());
}

    /**
     * @OA\Post(
     *     path="/comment",
     *     operationId="/comment",
     * @OA\Parameter(
     *         name="Comments",
     *         in="query",
     *         description="The Comments to add",
     *         required=true,
     *         @OA\Schema(type="Object")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="The Comment as been created",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    // Create new comment
    public function createProfile (Request $request)
    {

        $profile = Profile::create($request->all());
        return response()->json($profile);

    }

    /**
     * @OA\Put(
     *     path="/comment",
     *     operationId="/comment",
     * @OA\Parameter(
     *         name="Comments",
     *         in="query",
     *         description="The Comments to update",
     *         required=true,
     *         @OA\Schema(type="Object")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="The Comment has been updated",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    // Update an existing comment
   public function updateProfile  (Request $request){
        $profile = Profile::findOrFail($request->id);
       $profile->update($request->all());
       return response()->json($request);

    }
    /**
     * @OA\Delete(
     *     path="/comment/{uuid}",
     *     operationId="/comment",
     * @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         description="Delete all the entity Comments",
     *         required=true,
     *         @OA\Schema(type="String")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Comments has been successfully deleted",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */


    /**
     * @OA\Delete(
     *     path="/comment",
     *     operationId="/comment",
     * @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Delete Comment by id",
     *         required=true,
     *         @OA\Schema(type="Int")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Comment has been successfully deleted",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    public function deleteProfile  (Request $request)
    {
        $comment = Profile::find($request->input('id'));
        $comment->delete();
        return response()->json("Profile has been successfully deleted");

    }
}
