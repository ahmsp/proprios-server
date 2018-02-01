<?php

namespace Proprios\Http\Controllers\API\Auth;

use Proprios\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogoutAPIController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    /**
     * Logs out the user.
     * Revoke access token and refresh token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $accessToken = $request->user()->token();

        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();

        $json = [
            'success' => true,
            'code' => 200,
            'message' => 'You are Logged out.',
        ];

        return response()->json($json, '200');
    }
}
