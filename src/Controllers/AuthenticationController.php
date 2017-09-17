<?php
namespace Saad\LaravelJWT\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
class AuthenticationController extends BaseController {

    public function __construct(){

    }
    public function login(Request $request){
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status'=>false, 'message' => 'Email or password is not valid'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['status'=>false, 'message' => 'Something went wrong!'], 500);
        }

        // all good so return the token
        return response()->json(['status'=>true, 'message' => 'Logged in successfully', 'token'=>$token]);
    }
    public function register(Request $request){

    }
    public function logout(){
        try{
            $token = JWTAuth::getToken();
            JWTAuth::invalidate($token);
        } catch (JWTException $e){
            return response()->json(['status'=>false, 'message'=>$e->getMessage()]);
        }
        return response()->json(['status'=>true, 'message'=>'Logged out successfully']);
    }
}