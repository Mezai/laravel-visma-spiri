<?php

namespace Mezai\Visma\Test;

use Mezai\Visma\Providers\VismaServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            VismaServiceProvider::class,
        ];
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
