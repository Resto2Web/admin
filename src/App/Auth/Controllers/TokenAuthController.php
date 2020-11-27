<?php


namespace Resto2web\Admin\App\Auth\Controllers;

use Http;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Resto2web\Core\Common\Controllers\Controller;

class TokenAuthController extends Controller
{
    use AuthenticatesUsers;

    public function login($token)
    {
        $secret = "my_secret";
        $response = Http::withoutVerifying()->get("https://resto2web.test/ssoCheck/".$token."/".$secret);
        if ($response->successful()) {
            $user = User::where('email',$response->object()->email)->firstOrFail();
            if ($this->guard()->user()) {
                return redirect()->route('admin.index');
            }
            $this->guard()->login($user);
            return redirect($this->redirectTo());
        }else{
            dd($response);
            return ;
        }
    }

    public function redirectTo()
    {
        return route('admin.index');
    }


    protected function guard()
    {
        return Auth::guard(app('Resto2WebGuard'));
    }
}
