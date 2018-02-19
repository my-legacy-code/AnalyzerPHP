<?php

namespace Stackr\Analyzer\Service;

require_once __DIR__.'/../Models/Technology.php';
use JsonMapper;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @author Harry Liu
 * @version Feb 18, 2018
 */
class AnalyzerService
{
    /**
     * @var string
     */
    private $BASE_URL;

    function __construct($baseURL)
    {
        $this->BASE_URL = $baseURL;
    }

    function getTechnologies($appURL): PromiseInterface
    {
        $appURL = urlencode($appURL);
        $url = "{$this->BASE_URL}/{$appURL}/technologies";

        $client = new Client();

        $request = new Request('GET', $url);

        $mapper = new JsonMapper();
        $mapper->bEnforceMapType = false;

        return $client->sendAsync($request)
            ->then(function ($response) {
                return json_decode($response->getBody(), true);
            })
            ->then(function ($json) use ($mapper) {
                return $mapper->mapArray($json, array(), 'Stackr\Analyzer\Model\Technology');
            });
    }
}