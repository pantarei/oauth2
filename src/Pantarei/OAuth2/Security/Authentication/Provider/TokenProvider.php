<?php

/**
 * This file is part of the pantarei/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\OAuth2\Security\Authentication\Provider;

use Pantarei\OAuth2\Exception\InvalidClientException;
use Pantarei\OAuth2\Model\ClientInterface;
use Pantarei\OAuth2\Model\ClientManagerInterface;
use Pantarei\OAuth2\Security\Authentication\Token\ClientToken;
use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * TokenProvider implements OAuth2 token endpoint authentication.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
class TokenProvider implements AuthenticationProviderInterface
{
    protected $clientManager;

    public function __construct(
        ClientManagerInterface $clientManager
    )
    {
        $this->clientManager = $clientManager;
    }

    public function authenticate(TokenInterface $token)
    {
        if (!$this->supports($token)) {
            return null;
        }

        $client_id = $token->getClientId();
        $client_secret = $token->getClientSecret();

        $client = $this->clientManager->findClientByClientId($client_id);
        if ($client === null) {
            throw new InvalidClientException();
        }
        $currentClient = $token->getClient();

        if ($currentClient instanceof ClientInterface) {
            if ($client->getClientSecret() !== $currentClient->getClientSecret()) {
                throw new InvalidClientException();
            }
        } else {
            if ($client->getClientSecret() !== $client_secret) {
                throw new InvalidClientException();
            }
        }

        $authenticatedToken = new ClientToken($client_id, $client_secret, $token->getRoles());
        $authenticatedToken->setClient($client);
        $authenticatedToken->setUser($client->getClientId());

        return $authenticatedToken;
    }

    public function supports(TokenInterface $token)
    {
        return $token instanceof ClientToken;
    }
}
