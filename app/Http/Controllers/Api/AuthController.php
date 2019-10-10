<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use JWTAuthException;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth:api', ['except' => ['login','register']]);
//    }

    /**
     *
     * @SWG\Post(
     *      tags={"auth"},
     *      path="/auth/register",
     *      summary="register",
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
     *      @SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="123456",
     *      ),
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     */

    public function register(RegisterRequest $request)
    {
        $client = Client::create([
            'name' => $request->name,
            'code' => $request->code,
            'email' => $request->email,
            'city' => $request->city,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 0,
            'password' => bcrypt($request->password),
        ]);
        return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$client],200);
    }

    /**
     *
     * @SWG\Post(
     *      tags={"auth"},
     *      path="/auth/login",
     *      summary="login",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Parameter(
     *         name="email",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="mahmoudnada5050@gmail.com",
     *      ),
     *      @SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         required=true,
     *         type="string",
     *         format="string",
     *         default="123456",
     *      ),
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['invalid_email_or_password'], 422);
            }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return $this->respondWithToken($token);
    }

    /**
     *
     * @SWG\Get(
     *      tags={"auth"},
     *      path="/auth/logout",
     *      summary="logout currently logged in user",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="Successfully logged out"),
     * )
     */
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     *
     * @SWG\Post(
     *      tags={"auth"},
     *      path="/auth/refresh",
     *      summary="refreshes expired token",
     *      security={
     *          {"jwt": {}}
     *      },
     *      @SWG\Response(response=200, description="token"),
     *      @SWG\Response(response=400, description="Unauthorized"),
     * )
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh(\request()->bearerToken()));
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
