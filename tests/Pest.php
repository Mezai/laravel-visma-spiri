<?php

namespace Mezai\Visma\Test;

uses(TestCase::class)->in(__DIR__);

uses()->beforeEach(function () {
    config()->set('visma.client_id', 'laracartsandbox');
    config()->set('visma.client_secret', 'h!FQ25rGv9Zagkf-zxf!ZX36v2QyHO676ACLrZ7slaq1tYw9u7AzhNTs5DlYbZ3M');
    config()->set('visma.redirect_uri', 'https://localhost:44300/callback');
    config()->set('visma.scope', 'ea:api+ea:sales+ea:purchase+ea:accounting+vls:api+offline_access');
    config()->set('visma.environment', 'sandbox');
})->in(__DIR__);
