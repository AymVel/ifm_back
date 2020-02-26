<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Candidate;

class CandidateController extends Controller
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
     *     path="/Candidate/{uuid}",
     *     operationId="/Candidate",
     * @OA\Parameter(
     *         name="entity_uuid",
     *         in="path",
     *         description="The uuid of the entity",
     *         required=true,
     *         @OA\Schema(type="string")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Returns all the entity Candidates",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    public function getCandidateByid($id) {
            return Candidate::findOrFail($id);
    }

    /**
     * @OA\Get(
     *     path="/Candidate",
     *     operationId="/Candidate",
     *     @OA\Response(
     *         response="200",
     *         description="Returns all Candidates as an array of Candidates object",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     ),
     * )
     */

    public function getAllCandidate (){
        return response()->json(Candidate::all());
}

    /**
     * @OA\Post(
     *     path="/Candidate",
     *     operationId="/Candidate",
     * @OA\Parameter(
     *         name="Candidates",
     *         in="query",
     *         description="The Candidates to add",
     *         required=true,
     *         @OA\Schema(type="Object")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="The Candidate as been created",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    // Create new Candidate
    public function createCandidate (Request $request)
    {

        $Candidate = Candidate::create($request->all());
        return response()->json($Candidate);

    }

    /**
     * @OA\Put(
     *     path="/Candidate",
     *     operationId="/Candidate",
     * @OA\Parameter(
     *         name="Candidates",
     *         in="query",
     *         description="The Candidates to update",
     *         required=true,
     *         @OA\Schema(type="Object")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="The Candidate has been updated",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    // Update an existing Candidate
   public function updateCandidate  (Request $request){
        $Candidate = Candidate::findOrFail($request->id);
       $Candidate->update($request->all());
       return response()->json($request);

    }
    /**
     * @OA\Delete(
     *     path="/Candidate/{uuid}",
     *     operationId="/Candidate",
     * @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         description="Delete all the entity Candidates",
     *         required=true,
     *         @OA\Schema(type="String")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Candidates has been successfully deleted",
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
     *     path="/Candidate",
     *     operationId="/Candidate",
     * @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Delete Candidate by id",
     *         required=true,
     *         @OA\Schema(type="Int")
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="Candidate has been successfully deleted",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Error: Bad request. When required parameters were not supplied.",
     *     )
     * )
     */
    public function deleteCandidate  (Request $request)
    {
        $Candidate = Candidate::find($request->input('id'));
        $Candidate->delete();
        return response()->json("Candidate has been successfully deleted");

    }
}
