<?php

namespace Francerz\OAuth2\Client;

use Francerz\Http\Utils\UriHelper;
use Francerz\OAuth2\AuthorizeRequestTypes;
use Francerz\OAuth2\ScopeHelper;
use Psr\Http\Message\UriInterface;

class AuthorizationCodeRequest
{
    private $authClient; // AuthClient
    private $scopes = array(); // array
    private $state; // string

    public function __construct(
        AuthClient $authClient = null
    ) {
        $this->authClient = $authClient;
    }

    public function getAuthClient() : AuthClient
    {
        return $this->authClient;
    }

    public function withAuthClient(AuthClient $authClient) : AuthorizationCodeRequest
    {
        $new = clone $this;
        $new->authClient = $authClient;
        return $new;
    }

    public function getScopes() : array
    {
        return $this->scopes;
    }

    public function withAddedScope($scope_or_scopes) : AuthorizationCodeRequest
    {
        $new = clone $this;
        $new->scopes = ScopeHelper::merge($new->scopes, $scope_or_scopes);
        return $new;
    }

    public function withState(string $state) : AuthorizationCodeRequest
    {
        $new = clone $this;
        $new->state = $state;
        return $new;
    }
    public function getState() : string
    {
        return $this->state;
    }

    public function getRequestUri() : UriInterface
    {
        if (!isset($this->authClient)) {
            throw new \Exception("AuthClient not sets");
        }
        $params = [
            'response_type' => AuthorizeRequestTypes::AUTHORIZATION_CODE,
            'client_id' => $this->authClient->getClientId()
        ];

        $callbackEndpoint = $this->authClient->getCallbackEndpoint();
        if (isset($callbackEndpoint)) {
            $params['redirect_uri'] = (string)$callbackEndpoint;
        }
        if (!empty($this->scopes)) {
            $params['scope'] = join(' ', $this->scopes);
        }
        if (!empty($this->state)) {
            $params['state'] = $this->state;
        }

        $uri = $this->authClient->getAuthorizationEndpoint();
        $uri = UriHelper::withQueryParams($uri, $params);
        
        return $uri;
    }
}