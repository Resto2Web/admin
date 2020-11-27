<?php


namespace Resto2web\Admin\App\Admin\Controllers;


use Resto2web\Core\Common\Controllers\Controller;

class HomePageController extends Controller
{
    public function __invoke()
    {
        notify('TEts');
        return view('resto2web-admin::pages.home');
    }
}
