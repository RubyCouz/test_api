<?php
    namespace EterelzApi\JWT;
    use Lcobucci\JWT\Configuration;
    use Lcobucci\JWT\Signer;
    use Lcobucci\JWT\Signer\Key\InMemory;

    $configuration = Configuration::forAsymmetricSigner(
        new Signer\Rsa\Sha256(),
        InMemory::file(__DIR__ . "/key/private.pem"),
        InMemory::file(__DIR__ . "/key/public.pem")
    );