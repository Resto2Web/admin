<?php


namespace Resto2web\Admin\App\Admin\Controllers;


use Resto2web\Admin\App\Common\Controllers\Controller;

class HomePageController extends Controller
{
    public function __invoke()
    {
        return view('resto2web-admin::pages.home');
    }
}
