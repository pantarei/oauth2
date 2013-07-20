<?php

/**
 * This file is part of the pantarei/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\OAuth2\Model;

interface AuthorizeInterface extends ModelInterface
{
    /**
     * Set client_id
     *
     * @param string $client_id
     * @return Authorize
     */
    public function setClientId($client_id);

    /**
     * Get client_id
     *
     * @return string
     */
    public function getClientId();

    /**
     * Set username
     *
     * @param string $username
     * @return Authorize
     */
    public function setUsername($username);

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername();

    /**
     * Set scope
     *
     * @param array $scope
     * @return Authorize
     */
    public function setScope($scope);

    /**
     * Get scope
     *
     * @return array
     */
    public function getScope();
}
