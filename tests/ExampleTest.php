<?php

namespace Resto2web\Admin\Tests;

use Orchestra\Testbench\TestCase;
use Resto2web\Admin\AdminServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [AdminServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
