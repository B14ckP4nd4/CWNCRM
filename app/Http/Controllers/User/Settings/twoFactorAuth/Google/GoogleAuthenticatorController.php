<?php

    namespace App\Http\Controllers\User\Settings\twoFactorAuth\Google;

    use App\Http\Requests\User\Settings\twoFactorAuth\Google\GoogleAuthCode;
    use App\Http\Controllers\Controller;
    use PragmaRX\Google2FA\Google2FA;

    class GoogleAuthenticatorController extends Controller
    {
        private $google2fa;

        public function __construct()
        {
            $this->google2fa = new Google2FA();
        }

        // Source = https://scotch.io/tutorials/how-to-add-googles-two-factor-authentication-to-laravel

        public function index()
        {
            return 'This is Index of User/Settings/Google';
        }

        public function validateCode(GoogleAuthCode $request)
        {

            $user = \Auth::user();

            $secret = decrypt($request->secret);

            $validateCode = $this->google2fa->verifyKey($secret, $request->googleAuth);

            if (!$validateCode) {
                return back();
            }

            $user->g2fa_secret = $secret;
            $user->save();

            dd($validateCode);
        }

        public function activate()
        {

            $user = \Auth::user();

            if(!empty($user->g2fa_secret)){
                return 'Your Authenticator Already Activated !';
            }

            if (empty($user->g2fa_secret)) {
                $user->g2fa_secret = $this->google2fa->generateSecretKey();
            }

            $this->google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
            $QR_Image = $this->google2fa->getQRCodeInline(
                config('app.name'),
                $user->email,
                $user->g2fa_secret
            );


            return view('user.settings.twoFactorAuth.Google.activate', ['QR_Image' => $QR_Image,
                'secret' => $user->g2fa_secret,
                'secret_encrypted' => encrypt($user->g2fa_secret),
            ]);

        }


    }
