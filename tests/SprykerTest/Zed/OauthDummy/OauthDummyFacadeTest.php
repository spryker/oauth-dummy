<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\OauthDummy\Business;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\AccessTokenResponseTransfer;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group OauthDummy
 * @group Business
 * @group Facade
 * @group OauthDummyFacadeTest
 * Add your own group annotations below this line
 */
class OauthDummyFacadeTest extends Unit
{
    /**
     * @var \SprykerTest\Zed\OauthDummy\OauthDummyBusinessTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function testGenerateAccessTokenSuccess(): void
    {
        $accessTokenResponseTransfer = $this->tester->getFacade()->generateAccessToken();

        $this->assertInstanceOf(AccessTokenResponseTransfer::class, $accessTokenResponseTransfer);
        $this->assertTrue($accessTokenResponseTransfer->getIsSuccessful());
    }
}
