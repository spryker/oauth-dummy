<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthDummy\Business;

use Generated\Shared\Transfer\AccessTokenResponseTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\OauthDummy\Business\OauthDummyBusinessFactory getFactory()
 */
class OauthDummyFacade extends AbstractFacade implements OauthDummyFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\AccessTokenResponseTransfer
     */
    public function generateAccessToken(): AccessTokenResponseTransfer
    {
        return $this->getFactory()
            ->createAccessTokenGenerator()
            ->generateAccessToken();
    }
}
