<?php
/**
 * Spike library
 * @author Tao <taosikai@yeah.net>
 */
namespace Spike\Protocol;

use GuzzleHttp\Psr7;
use Psr\Http\Message\ResponseInterface as Psr7Response;

class ProxyResponse extends Response
{
    /**
     * @var Psr7Response
     */
    protected $response;

    public function __construct($code, Psr7Response $response, $headers = [])
    {
        $this->response = $response;
        parent::__construct($code, 'proxy_response', $headers);
    }

    /**
     * @return Psr7Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    public function getBody()
    {
        return Psr7\str($this->response);
    }

    public static function parseBody($body)
    {
        return Psr7\parse_response($body);
    }
}