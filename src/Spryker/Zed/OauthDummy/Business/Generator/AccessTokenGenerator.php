<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OauthDummy\Business\Generator;

use DateInterval;
use DateTimeImmutable;
use Generated\Shared\Transfer\AccessTokenResponseTransfer;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use Spryker\Zed\OauthDummy\OauthDummyConfig;

class AccessTokenGenerator implements AccessTokenGeneratorInterface
{
    /**
     * @var \Spryker\Zed\OauthDummy\OauthDummyConfig
     */
    protected $oauthDummyConfig;

    /**
     * @param \Spryker\Zed\OauthDummy\OauthDummyConfig $oauthDummyConfig
     */
    public function __construct(OauthDummyConfig $oauthDummyConfig)
    {
        $this->oauthDummyConfig = $oauthDummyConfig;
    }

    /**
     * @return \Generated\Shared\Transfer\AccessTokenResponseTransfer
     */
    public function generateAccessToken(): AccessTokenResponseTransfer
    {
        $configuration = Configuration::forAsymmetricSigner(
            new Sha256(),
            InMemory::file($this->oauthDummyConfig->getPathToPrivateKey()),
            InMemory::file($this->oauthDummyConfig->getPathToPublicKey()),
        );

        $expiredIn = '1800';
        $expiredAt = (new DateTimeImmutable())
            ->add(new DateInterval("PT{$expiredIn}S"));

        $tokenBuilder = $configuration->builder()
            ->relatedTo('some subject')
            ->issuedAt(new DateTimeImmutable())
            ->expiresAt($expiredAt);

        foreach ($this->oauthDummyConfig->getAccessTokenCustomClaims() as $name => $value) {
            $tokenBuilder->withClaim($name, $value);
        }

        return (new AccessTokenResponseTransfer())
            ->setIsSuccessful(true)
            ->setAccessToken($tokenBuilder->getToken($configuration->signer(), $configuration->signingKey())->toString())
            ->setExpiresIn($expiredIn);
    }
}
