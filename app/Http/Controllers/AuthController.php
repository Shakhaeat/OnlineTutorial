<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'name' => 'string|max:255',
        //     'email' => 'string|max:255',
        //     'password' => 'string|min:2',
        //     'phone' =>
        // ]);
        
        // if ($validator->fails()) {
        //     return response()->json([
        //         'code' => 400,
        //         'status' => false,
        //         'message' => "Validation Failed"
        //     ], 400);
        // }

        $input = $request->all();
        $user = User::create($input);
        // $user->password = Hash::make($input['password']);
        // $user->save();
        
        // $token = auth('api')->login(['email' => $input['email'], 'password' => $input['password']]);

        return response()->json([
            'code'   => 200,
            'status' => true,
            'message'=> "Register Success",
           // 'token' => $token
        ], 200);
    }
    
    // public function register(Request $request){
    //  $user = User::create([
    //      'name' => $request->name,
    //      'email' => $request->email,
    //      'password' => bcrypt($request->password),
    //  ]);
    //  $token = auth()->login($user);
    //  return $this->respondWithToken($token);
    // }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'status' => false,
                'message' => "Login.. Failed. Missing email or password."
            ], 400);
        }

        $token = auth()->attempt(['email' => $request->email, 'password' => $request->password]);
        if(!($token)){
            $token = auth()->attempt(['email' => $request->email, 'password' => $request->password]);
        }
        if($token){
            return response()->json([
                'code'   => 200,
                'status' => true,
                'message'=> "Login Success",
                'token' => $token
            ], 200);
        }
        return response()->json([
            'code' => 400,
            'status' => false,
            'message' => "Login Failed. Invalid email or password",
        ], 400);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request){
        auth()->logout();
        return response()->json([
           // 'code'   => $this->successStatus,
            'status' => true,
            'message'=> "Logout Success",
            'data'   => []
        ]);
        //], $this->successStatus);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}