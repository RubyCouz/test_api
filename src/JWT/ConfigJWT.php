<?php
    namespace EterelzApi\JWT;
    use Lcobucci\JWT\Configuration;
    use Lcobucci\JWT\Signer\Rsa\Sha256;
    use Lcobucci\JWT\Signer\Key\LocalFileReference;

    
    $configJWT = Configuration::forAsymmetricSigner(
        new Sha256(),
        LocalFileReference::file(__DIR__ . "/key/private.pem","lapin"),
        LocalFileReference::file(__DIR__ . "/key/public.pem")
    );


    //$container->set(Configuration::class, $configuration);