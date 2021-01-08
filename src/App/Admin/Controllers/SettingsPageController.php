<?php


namespace Resto2web\Admin\App\Admin\Controllers;

use Artesaos\SEOTools\Traits\SEOTools;
use Resto2web\Core\Common\Controllers\Controller;


class SettingsPageController extends Controller
{
    use SEOTools;
    public function index()
    {
        $this->seo()->setTitle('Paramètres');
        return view('resto2web-admin::pages.settings.home');
    }
}
