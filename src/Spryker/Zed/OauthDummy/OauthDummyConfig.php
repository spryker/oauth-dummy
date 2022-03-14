<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthDummy;

use Spryker\Shared\OauthDummy\OauthDummyConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class OauthDummyConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @return string
     */
    public function getPathToPublicKey(): string
    {
        return APPLICATION_ROOT_DIR . '/config/Zed/dev_only_public.key';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getPathToPrivateKey(): string
    {
        return APPLICATION_ROOT_DIR . '/config/Zed/dev_only_private.key';
    }

    /**
     * @api
     *
     * @return array<string>
     */
    public function getAccessTokenCustomClaims(): array
    {
        return [
            'azp' => 'dev_tenant_oauth_client_id_1',
        ];
    }

    /**
     * @api
     *
     * @return bool
     */
    public function isDummyProviderEnabled(): bool
    {
        return $this->get(OauthDummyConstants::IS_DUMMY_PROVIDER_ENABLED, false);
    }
}
