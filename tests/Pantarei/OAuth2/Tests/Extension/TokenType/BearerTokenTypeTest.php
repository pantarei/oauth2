<?php

/**
 * This file is part of the pantarei/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\OAuth2\Tests\Extension\TokenType;

use Pantarei\OAuth2\Extension\TokenType\BearerTokenType;
use Pantarei\OAuth2\OAuth2WebTestCase;

/**
 * Test Bearer token type functionality.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
class BearerTokenTypeTest extends OAuth2WebTestCase
{
  public function testTokenType()
  {
    $grant_type = new BearerTokenType($this->app);
    $this->assertEquals('token_type', $grant_type->getParent());
    $this->assertEquals('bearer', $grant_type->getName());
  }
}