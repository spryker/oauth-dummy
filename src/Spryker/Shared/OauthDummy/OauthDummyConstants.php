<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\OauthDummy;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface OauthDummyConstants
{
    /**
     * Specification:
     * - Specifies the state of the provider.
     *
     * @api
     *
     * @var string
     */
    public const IS_DUMMY_PROVIDER_ENABLED = 'IS_DUMMY_PROVIDER_ENABLED';
}
