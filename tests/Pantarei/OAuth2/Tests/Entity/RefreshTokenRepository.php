<?php

/**
 * This file is part of the pantarei/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\OAuth2\Tests\Entity;

use Doctrine\ORM\EntityRepository;
use Pantarei\OAuth2\Model\RefreshTokenInterface;
use Pantarei\OAuth2\Model\RefreshTokenManagerInterface;

/**
 * RefreshTokenRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RefreshTokenRepository extends EntityRepository implements RefreshTokenManagerInterface
{
    public function getClass()
    {
        return $this->getClassName();
    }

    public function createRefreshToken()
    {
        $class = $this->getClass();
        return new $class();
    }

    public function deleteRefreshToken(RefreshTokenInterface $refresh_token)
    {
        $this->getEntityManager()->remove($refresh_token);
        $this->getEntityManager()->flush();
    }

    public function reloadRefreshToken(RefreshTokenInterface $refresh_token)
    {
        $this->getEntityManager()->refresh($refresh_token);
    }

    public function updateRefreshToken(RefreshTokenInterface $refresh_token)
    {
        $this->getEntityManager()->persist($refresh_token);
        $this->getEntityManager()->flush();
    }

    public function findRefreshTokenByRefreshToken($refresh_token)
    {
        return $this->findOneBy(array(
            'refresh_token' => $refresh_token,
        ));
    }
}
