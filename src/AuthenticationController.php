<?php

namespace Nanissa\Authentication;

use Nanissa\Authentication\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|View
     **/
    public function index()
    {
        return view('authentication::login');
    }

    /**
    * @return \Illuminate\Contracts\View\Factory|View
     **/
    public function showRegistrationForm()
    {
        return view('authentication::register');
    }

    /**
     * @param AuthLoginRequest $request
     * @return JsonResponse
     */
    public function login(AuthLoginRequest $request)
    {
        if (!$this->checkForUser($request)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $credentials = request(['email', 'password'], $request->remember_me);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
        ]);
    }

    public function register(AuthRegisterRequest $request)
    {
        $request['password'] = Hash::make($request->password);

        $model = $this->getUserModel($request);

        return $model::create($request->all());
    }

    public function logout(Request $request)
    {
        return $request->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
    }

    public function getUserModel(Request $request)
    {
        $type = $request->user_type ?? config('authentication.default_user_model');
        $models = config('authentication.user_models');

        if (array_key_exists($type, (array)$models)) {
            return $models[$type];
        } else {
            return response()->json('You must set the default user model in the authentication config file!', 422);
        }
    }

    public function checkForUser(Request $request)
    {
        $model = $this->getUserModel($request);
        $user = $model::where('email', $request->email)->first();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}
