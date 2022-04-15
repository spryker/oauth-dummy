<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthDummy;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class OauthDummyConfig extends AbstractBundleConfig
{
    /**
     * @var string
     */
    public const EXPIRES_IN = '86400';

    /**
     * @var string
     */
    public const SUBJECT = 'subject';

    /**
     * @var string
     */
    public const STORE_REFERENCE_KEY = 'store_reference';

    /**
     * @var string
     */
    public const PROVIDER_NAME = 'dummy';

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
    public function isDevelopmentMode(): bool
    {
        return APPLICATION_ENV === 'development' || APPLICATION_ENV === 'docker.dev';
    }

    /**
     * @api
     *
     * @return bool
     */
    public function isTestingMode(): bool
    {
        return (bool)getenv('SPRYKER_TESTING_ENABLED');
    }

    /**
     * @api
     *
     * @return string
     */
    public function getExpiredIn(): string
    {
        return static::EXPIRES_IN;
    }

    /**
     * @api
     *
     * @return string
     */
    public function getSubject(): string
    {
        return static::SUBJECT;
    }

    /**
     * @api
     *
     * @return string
     */
    public function getStoreReferenceKey(): string
    {
        return static::STORE_REFERENCE_KEY;
    }
}
