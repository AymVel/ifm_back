<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
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
     *     path="/Offer/{uuid}",
     *     operationId="/Offer",
     * @OA\Parameter(
     *         name="entity_uuid",
     *         in="path",
     *         description="The uuid of the entity",
     *         required=true,
     *         @OA\Schema(type="string")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns all the entity Offers",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    public function getOfferByid($id) {
            return Offer::findOrFail($id);
    }

    /**
     * @OA\Get(
     *     path="/Offer",
     *     operationId="/Offer",
     *     @OA\Response(
     *         response="200",
     *         description="Returns all Offers as an array of Offers object",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */

    public function getAllOffer (){
        return response()->json(Offer::all());
}

    /**
     * @OA\Post(
     *     path="/Offer",
     *     operationId="/Offer",
     * @OA\Parameter(
     *         name="Offers",
     *         in="query",
     *         description="The Offers to add",
     *         required=true,
     *         @OA\Schema(type="Object")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="The Offer as been created",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    // Create new Offer
    public function createOffer (Request $request)
    {

        $Offer = Offer::create($request->all());
        return response()->json($Offer);

    }

    /**
     * @OA\Put(
     *     path="/Offer",
     *     operationId="/Offer",
     * @OA\Parameter(
     *         name="Offers",
     *         in="query",
     *         description="The Offers to update",
     *         required=true,
     *         @OA\Schema(type="Object")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="The Offer has been updated",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    // Update an existing Offer
   public function updateOffer  (Request $request){
        $Offer = Offer::findOrFail($request->id);
       $Offer->update($request->all());
       return response()->json($request);

    }
    /**
     * @OA\Delete(
     *     path="/Offer/{uuid}",
     *     operationId="/Offer",
     * @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         description="Delete all the entity Offers",
     *         required=true,
     *         @OA\Schema(type="String")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Offers has been successfully deleted",
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
     *     path="/Offer",
     *     operationId="/Offer",
     * @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Delete Offer by id",
     *         required=true,
     *         @OA\Schema(type="Int")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Offer has been successfully deleted",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    public function deleteOffer  (Request $request)
    {
        $Offer = Offer::find($request->input('id'));
        $Offer->delete();
        return response()->json("Offer has been successfully deleted");

    }
}
