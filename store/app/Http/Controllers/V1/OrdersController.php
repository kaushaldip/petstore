<?php
/**
 * Created by PhpStorm.
 * User: kds
 * Date: 24/3/19
 * Time: 11:27 AM
 */

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;

use App\Order;
use App\Traits\ApiResponser;


use Illuminate\Http\Request;

use Illuminate\Http\Response;

class OrdersController extends Controller
{
    use ApiResponser;
    public function __construct()
    {

    }

    public function inventory(Request $request)
    {

        try {

            $orders = Order::where('status', '=', $request->status)->get();
            if (count($orders)>0) {

                $message="successful operation";
                return $this->successResponse($orders,$message);
            } else {
                return $this->errorResponse("Pet not found",Response::HTTP_UNPROCESSABLE_ENTITY);

            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }

    }
    public function createOrder(Request $request)
    {

        try {


            $requestData = $request->all();


            $pet = Order::create($requestData);
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
    public function getOrder(Request $request)
    {

        try {

            $orders = Order::where('id', '=', $request->orderId)->get()->first();
            if ($orders) {

                $message="successful operation";
                return $this->successResponse($orders,$message);
            } else {
                return $this->errorResponse("Pet not found",Response::HTTP_UNPROCESSABLE_ENTITY);

            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function deleteOrder(Request $request)
    {
        try {

            $orders = Order::where('id', '=', $request->orderId)->get()->first();
            if($orders) {
                if ($orders->delete()) {

                    $message = "successful operation";
                    return $this->successResponse($orders, $message);
                } else {
                    return $this->errorResponse("Couldnt delete", Response::HTTP_UNPROCESSABLE_ENTITY);

                }
            }
            else {
                return $this->errorResponse("Pet Not Found", Response::HTTP_UNPROCESSABLE_ENTITY);

            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

}