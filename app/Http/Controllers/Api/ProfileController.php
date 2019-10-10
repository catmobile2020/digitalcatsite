<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\RegisterRequest;
use App\Order;
use App\Http\Controllers\Controller;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     *
     * @SWG\Get(
     *      tags={"account"},
     *      path="/account/me",
     *      summary="Get the current logged in user",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        $user = JWTAuth::authenticate();
        return response()->json(['result' =>$user],200);
    }

    /**
     *
     * @SWG\post(
     *      tags={"account"},
     *      path="/account/update",
     *      summary="update My Account",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="name",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="mahmoud",
     *      ),@SWG\Parameter(
     *         name="code",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="301",
     *      ),@SWG\Parameter(
     *         name="phone",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="01208971865",
     *      ),@SWG\Parameter(
     *         name="email",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="mahmoudnada5050@gmail.com",
     *      ),@SWG\Parameter(
     *         name="city",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="cairo",
     *      ),@SWG\Parameter(
     *         name="address",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="10th nasr city",
     *      ),
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     * @param RegisterRequest $request
     * @return AccountResource
     */
    public function update(RegisterRequest $request)
    {
        $user = JWTAuth::authenticate();
        $user->update($request->all());
        return response()->json(['result' =>$user],200);
    }


    /**
     *
     * @SWG\post(
     *      tags={"account"},
     *      path="/account/update-password",
     *      summary="update My Password",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="current_password",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *      ),@SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *      ),
     *      @SWG\Response(response=200, description="User Model"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     * @param Request $request
     * @return AccountResource|\Illuminate\Http\JsonResponse
     */
    public function updatePassword(Request $request)
    {
        $user = JWTAuth::authenticate();
        if (Hash::check($request->current_password,$user->password))
        {
            if ($request->current_password === $request->password)
            {
                return response()->json(['status'=>200,'message'=>__('translate.same_password')]);
            }
            $user->update(['password'=>bcrypt($request->password)]);

            return AccountResource::make($user);
        }
        return response()->json(['status'=>400,'message'=>__('translate.wrong_password')]);
    }


    /**
     *
     * @SWG\Get(
     *      tags={"account"},
     *      path="/account/my-orders",
     *      summary="Get my orders Product",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="objects"),
     * )
     */
    public function myOrders()
    {
        $user = JWTAuth::authenticate();
        return response()->json(['result'=>$user->orders()->paginate(5)],200);
    }


    /**
     *
     * @SWG\Get(
     *      tags={"account"},
     *      path="/account/my-orders/{order}",
     *      summary="Get single order",
     *      security={
     *          {"jwt": {}}
     *      },
     *     @SWG\Parameter(
     *         name="order",
     *         in="path",
     *         required=true,
     *         type="integer",
     *         format="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Order $order
     * @return OrderResource
     */
    public function singleOrder(Order $order)
    {
        return response()->json(['result'=>$order],200);
    }
}
