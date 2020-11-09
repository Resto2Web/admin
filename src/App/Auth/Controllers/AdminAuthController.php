<?php


namespace Resto2web\Admin\App\Auth\Controllers;

use Resto2web\Admin\App\Common\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;
    public function login()
    {
        if ($this->guard()->user()) {
            return redirect()->route('admin.index');
        }

        return view('resto2web-admin::auth.login');
    }


    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    public function redirectTo()
    {
        return route('admin.index');
    }


    protected function guard()
    {
        return Auth::guard(app('Resto2WebGuard'));
    }
}
