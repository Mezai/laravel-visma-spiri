<?php

namespace Mezai\Visma\Api;

class Order extends AbstractResource
{
    /** @var string */
    protected $endpoint = '/orders';


    public function index()
    {
        $response = $this->request('GET', $this->endpoint);

    }

    // retrieve an order
    public function get($order): Payment {}
}
