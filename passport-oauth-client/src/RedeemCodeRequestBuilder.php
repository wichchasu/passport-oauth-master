<?php

namespace Francerz\OAuth2\Client;

use Francerz\Http\Utils\Constants\MediaTypes;
use Francerz\Http\Utils\Constants\Methods;
use Francerz\Http\Utils\MessageHelper;
use Francerz\OAuth2\Client\AuthClient;
use Francerz\OAuth2\TokenRequestGrantTypes;
use Psr\Http\Message\RequestInterface;

class RedeemCodeRequestBuilder
{
    private $authClient;
    private $code;

    public function __construct(AuthClient $authClient = null, string $code = null)
    {
        $this->authClient = $authClient;
        $this->code = $code;
    }

    public function withAuthClient(AuthClient $authClient)
    {
        $new = clone $this;
        $new->authClient = $authClient;
        return $new;
    }

    public function getAuthClient() : AuthClient
    {
        return $this->authClient;
    }

    public function withCode(string $code)
    {
        $new = clone $this;
        $new->code = $code;
        return $new;
    }

    public function getCode() : string
    {
        return $this->code;
    }

    public function getRequest() : RequestInterface
    {
        if (!isset($this->authClient)) {
            throw new \Exception('AuthClient not set');
        }
        if (!isset($this->code)) {
            throw new \Exception('Code not set');
        }

        $uri = $this->authClient->getTokenEndpoint();
        
        $request = $this->authClient->getHttpFactory()->getRequestFactory()
            ->createRequest(Methods::POST, $uri);
        $requestBody = array(
            'grant_type'=> TokenRequestGrantTypes::AUTHORIZATION_CODE,
            'code'      => $this->code,
        );
        
        $callbackEndpoint = $this->authClient->getCallbackEndpoint();
        if (isset($callbackEndpoint)) {
            $requestBody['redirect_uri'] = (string)$callbackEndpoint;
        }

        MessageHelper::setHttpFactoryManager($this->authClient->getHttpFactory());
        $request = MessageHelper::withContent($request, MediaTypes::APPLICATION_X_WWW_FORM_URLENCODED, $requestBody);

        return $request;
    }
}