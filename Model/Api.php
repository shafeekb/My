<?php

namespace My\PropertySystem\Model;

use My\PropertySystem\Helper\Data;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientFactory;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ResponseFactory;
use Magento\Framework\Webapi\Rest\Request;

/**
 * Class Api
 *
 * @package My\PropertySystem\Model
 */
class Api
{
    /**
     * @var Data
     */
    protected $propertyHelper;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ClientFactory
     */
    protected $clientFactory;

    /**
     * @var ResponseFactory
     */
    protected $responseFactory;

    public function __construct(
        Data $propertyHelper,
        LoggerInterface $logger,
        ClientFactory $clientFactory,
        ResponseFactory $responseFactory
    ) {
        $this->propertyHelper = $propertyHelper;
        $this->logger = $logger;
        $this->clientFactory = $clientFactory;
        $this->responseFactory = $responseFactory;
    }

    /**
     * Fetch some data from API
     */
    public function execute()
    {
        $repositoryName = 'api/properties';
        $response = $this->doRequest($this->propertyHelper->getApiUrl() . $repositoryName);
        $status = $response->getStatusCode(); // 200 status code
        if ($status != 200) {
            return false;
        }
        $responseBody = $response->getBody();

        return $responseBody->getContents();
    }

    /**
     * Do API request with provided params
     *
     * @param string $uriEndpoint
     * @param array $params
     * @param string $requestMethod
     * @return Response
     */
    private function doRequest(
        string $uriEndpoint,
        array $params = [],
        string $requestMethod = Request::HTTP_METHOD_GET
    ): Response {
        /** @var Client $client */
        $client = $this->clientFactory->create([
            'config' => [
                'base_uri' => $this->propertyHelper->getApiUrl()
            ]
        ]);

        try {
            $response = $client->request(
                $requestMethod,
                $uriEndpoint,
                $params
            );
        } catch (GuzzleException $exception) {
            /** @var Response $response */
            $response = $this->responseFactory->create([
                'status' => $exception->getCode(),
                'reason' => $exception->getMessage()
            ]);
        }

        return $response;
    }
}