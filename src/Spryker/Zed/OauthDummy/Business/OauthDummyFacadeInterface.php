<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthDummy\Business;

use Generated\Shared\Transfer\AccessTokenResponseTransfer;

interface OauthDummyFacadeInterface
{
    /**
     * Specification:
     * - Returns AccessTokenResponseTransfer with dummy token
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\AccessTokenResponseTransfer
     */
    public function generateAccessToken(): AccessTokenResponseTransfer;
}
