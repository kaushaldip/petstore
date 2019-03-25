<?php
/**
 * Created by PhpStorm.
 * User: kds
 * Date: 24/3/19
 * Time: 11:27 AM
 */

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Support\Carbon;
use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Response;


class PetsController extends Controller
{
    use ApiResponser;
    public function __construct()
    {

    }

    public function createPet(Request $request)
    {

        try {

            //check if category name exist/ insert if not and return the category id.

            //create category if doesnt exist

            $pet = Pet::create($request->only(['name', 'status', 'category_id']));

           // $insert_pet_id=$pet->id; use this id to insert into tables
            //check and insert tags

            //check and insert medias

            //insert into petTags table
            //insert into petMedias table



            if ($pet) {
                $message="Successful Operation";
                return $this->successResponse($pet,$message);

            } else {
                //the error message can be send based on  logic
                return $this->errorResponse("logical wrong",Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

    }

    public function findByStatus(Request $request)
    {

        try {
            $pets = Pet::where('status', '=', $request->status)->get();
            if (count($pets)>0) {

                $message="successful operation";
                return $this->successResponse($pets,$message);
            } else {
                return $this->errorResponse("Pet not found",Response::HTTP_UNPROCESSABLE_ENTITY);

            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

    }
    public function findById(Request $request)
    {

        try {
            $pets = Pet::where('id', '=', $request->petId)->get()->first();
            if ($pets) {

                $message="successful operation";
                return $this->successResponse($pets,$message);
            } else {
                return $this->errorResponse("Pet not found",Response::HTTP_UNPROCESSABLE_ENTITY);

            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

    }


    public function updatePet(Request $request)
    {

        $pet = Pet::where('id', '=', $request->petId)->get()->first();
        if(!$pet){
            return $this->errorResponse("Pet not found",Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $updated = $pet
            ->fill($request->except('petId'))
            ->save();
        if ($updated) {

            $message="successful operation";
            return $this->successResponse($pet,$message);
        } else {

            return $this->errorResponse("Couldnt updated",Response::HTTP_UNPROCESSABLE_ENTITY);
        }


    }

    public function deletePet(Request $request)
    {
try{


        $pet = Pet::where('id', '=', $request->petId)->get()->first();
        //use softdelete in future so there is no Integrity constraint violation
        if($pet->delete()){

            $message="successful operation";
            return $this->successResponse($pet,$message);
        }
        else{
            return $this->errorResponse("Couldnt delete",Response::HTTP_UNPROCESSABLE_ENTITY);

        }
}
catch(\Exception $e){
    return $this->errorResponse($e->getMessage());
}

    }

}