<?php

namespace App\Http\Controllers\User\Settings\twoFactorAuth\Google;

use App\Http\Middleware\Authenticate;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Http\Request;

class GoogleAuthenticatorController extends Controller
{

    public function __construct()
    {
        $this->middleware([
            'auth',
            'password.confirm'
        ]);
    }

    // Source = https://scotch.io/tutorials/how-to-add-googles-two-factor-authentication-to-laravel

    public function index()
    {
        return 'This is Index of User/Settings/Google';
    }

    public function validateCode()
    {
        $validate = Request()->validate([
            ''
        ]);
        dd(Request()->all());
    }

    public function activate()
    {
        $user = \Auth::user();
        $google2fa = app('pragmarx.google2fa');
        if(empty($user->g2fa_secret)){
            $user->g2fa_secret = $google2fa->generateSecretKey();
            $user->save();
        }

//        dd($user->g2fa_secret);
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $user->g2fa_secret
        );

        return view('user.settings.twoFactorAuth.Google.activate', ['QR_Image' => $QR_Image,
            'secret' => $user->google2fa_secret,
            'reauthenticating' => true
        ]);
//        return 'This is Authenticator';
    }




}
