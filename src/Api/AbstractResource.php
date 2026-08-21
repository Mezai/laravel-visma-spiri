<?php

namespace Mezai\Visma\Api;

use Mezai\Visma\Client;

abstract class AbstractResource {

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve resource
     *
     * @param $resource
     * @return mixed
     */
    abstract public function get($resource); 
    
    /**
     * Create resource
     *
     * @param $transaction
     * @return mixed
     */
    abstract public function create($resource);
    

    abstract public function index();
    
    /**
     * Delete a resource
     *
     * @param $resource
     * @return mixed
     */
    abstract public function delete($resource);


        /**
     * Main API caller
     *
     * @param string $verb
     * @param string $uri
     * @param array<string, string> $headers
     * @param string|null $payload
     * @return ResponseInterface
     * @throws ClientException|ServerException|ValidationException
     */
    protected function request(
        string $verb, 
        string $path,
        array $headers = [],
        ?string $payload = null
    )
    {

        $provider = $this->client->getProvider();
        $accessToken = $this->client->getToken();
        $baseEndpoint = $this->client->getEndpoint();
        $request = $provider->getAuthenticatedRequest(
            $verb,
            $baseEndpoint . $path, 
            $accessToken
        );

        $response = $this->client->getProvider()->getResponse($request);       
        $status = $response->getStatusCode();


        switch (true) {

        }

        return $response;
    }
}