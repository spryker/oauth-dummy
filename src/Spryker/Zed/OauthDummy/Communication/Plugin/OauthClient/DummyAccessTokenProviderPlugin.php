<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthDummy\Communication\Plugin\OauthClient;

use Generated\Shared\Transfer\AccessTokenRequestTransfer;
use Generated\Shared\Transfer\AccessTokenResponseTransfer;
use Spryker\Zed\OauthClientExtension\Dependency\Plugin\OauthAccessTokenProviderPluginInterface;
use Spryker\Zed\OauthDummy\OauthDummyConfig;

/**
 * @method \Spryker\Zed\OauthDummy\Business\OauthDummyFacade getFacade()
 */
class DummyAccessTokenProviderPlugin implements OauthAccessTokenProviderPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AccessTokenRequestTransfer $accessTokenRequestTransfer
     *
     * @return bool
     */
    public function isApplicable(AccessTokenRequestTransfer $accessTokenRequestTransfer): bool
    {
        return (new OauthDummyConfig())->isDummyProviderEnabled() === true;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AccessTokenRequestTransfer $accessTokenRequestTransfer
     *
     * @return \Generated\Shared\Transfer\AccessTokenResponseTransfer
     */
    public function getAccessToken(
        AccessTokenRequestTransfer $accessTokenRequestTransfer
    ): AccessTokenResponseTransfer {
        return $this->getFacade()->generateAccessToken();
    }
}
