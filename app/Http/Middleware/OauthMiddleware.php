<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use OAuth2\HttpFoundationBridge\Request as OAuthRequest;
use App\WpUser;
use DB;

class OauthMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        //check if the access token is present.
        
        
        if (!$request->header('access_token')) {
            return response()->json('Token not Found');
        } else {
            $_GET['access_token'] = $request->header('access_token');
            //$_POST['username'] = $request->request('phone_number');
        }
        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals($request);
        $bridgedRequest = OAuthRequest::createFromRequest($req);
        $bridgedResponse = new \OAuth2\HttpFoundationBridge\Response();

        /** To return error codes for access token expired * */
        if (!$token = App::make('oauth2')->getAccessTokenData($bridgedRequest, $bridgedResponse)) {
            $response = App::make('oauth2')->getResponse();

            Log::info('RESPONSE ===' . print_r($response, true));

            if ($response->isClientError() && $response->getParameter('error')) {
                if ($response->getParameter('error') == 'expired_token') {
                    //fetch the access token from the form.
                    $acc = $request->header('access_token');
                    //fetch the phone number from oauth_access_tokens
                    $phone = DB::table('oauth_access_tokens')
                            ->select('user_id')
                            ->where('access_token', $acc)
                            ->get();
                    //update the user status
                    $updUser = WpUser::join('users', 'wp_users.ID', '=', 'users.id')
                            ->where('users.phone', $phone['0']->user_id)
                            ->update(['user_status' => 0]);                   

                    return response()->json(array('status' => 'failure', 'message' => 'The access token provided has expired'));
                }
                return response()->json(array('status' => 'failure', 'message' => 'Invalid Token.'));
            }
        } else {
            $request['user_id'] = $token['user_id'];
        }
        return $next($request);
    }

}
