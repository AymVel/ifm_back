<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Favorite;

class FavoriteController extends Controller
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
     *     path="/Favorite/{uuid}",
     *     operationId="/Favorite",
     * @OA\Parameter(
     *         name="entity_uuid",
     *         in="path",
     *         description="The uuid of the entity",
     *         required=true,
     *         @OA\Schema(type="string")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns all the entity Favorites",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    public function getFavoriteByid($id) {
            return Favorite::findOrFail($id);
    }

    /**
     * @OA\Get(
     *     path="/Favorite",
     *     operationId="/Favorite",
     *     @OA\Response(
     *         response="200",
     *         description="Returns all Favorites as an array of Favorites object",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */

    public function getAllFavorite (){
        return response()->json(Favorite::all());
}

    /**
     * @OA\Post(
     *     path="/Favorite",
     *     operationId="/Favorite",
     * @OA\Parameter(
     *         name="Favorites",
     *         in="query",
     *         description="The Favorites to add",
     *         required=true,
     *         @OA\Schema(type="Object")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="The Favorite as been created",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    // Create new Favorite
    public function createFavorite (Request $request)
    {

        $Favorite = Favorite::create($request->all());
        return response()->json($Favorite);

    }

    /**
     * @OA\Put(
     *     path="/Favorite",
     *     operationId="/Favorite",
     * @OA\Parameter(
     *         name="Favorites",
     *         in="query",
     *         description="The Favorites to update",
     *         required=true,
     *         @OA\Schema(type="Object")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="The Favorite has been updated",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    // Update an existing Favorite
   public function updateFavorite  (Request $request){
        $Favorite = Favorite::findOrFail($request->id);
       $Favorite->update($request->all());
       return response()->json($request);

    }
    /**
     * @OA\Delete(
     *     path="/Favorite/{uuid}",
     *     operationId="/Favorite",
     * @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         description="Delete all the entity Favorites",
     *         required=true,
     *         @OA\Schema(type="String")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Favorites has been successfully deleted",
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
     *     path="/Favorite",
     *     operationId="/Favorite",
     * @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Delete Favorite by id",
     *         required=true,
     *         @OA\Schema(type="Int")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Favorite has been successfully deleted",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    public function deleteFavorite  (Request $request)
    {
        $Favorite = Favorite::find($request->input('id'));
        $Favorite->delete();
        return response()->json("Favorite has been successfully deleted");

    }
}
