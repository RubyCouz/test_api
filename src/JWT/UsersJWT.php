<?php
    namespace EterelzApi\JWT;

    use Exception;
    use Lcobucci\JWT\Configuration;
    use Lcobucci\JWT\UnencryptedToken;
    use Lcobucci\JWT\Validation\Constraint\LooseValidAt;
    use Lcobucci\JWT\Validation\Constraint\IssuedBy;
    use Lcobucci\JWT\Validation\Constraint\SignedWith;
    use Lcobucci\Clock\FrozenClock;


    class UsersJWT
    {
        private int $id;

        private array $roles;

        private string $username;

        public function __construct()
        {
            if (isset($_COOKIE['jwt_hp']) && isset($_COOKIE['jwt_s'])) {
                $clock = FrozenClock::fromUTC();

                //$configJWT
                require "./src/JWT/ConfigJWT.php";
                assert($configJWT instanceof Configuration);
                
                $cookieJWT = $_COOKIE['jwt_hp'] . "." . $_COOKIE['jwt_s'] ;
                $token = $configJWT->parser()->parse($cookieJWT);
                assert($token instanceof UnencryptedToken);
                
                $constraints = [
                    new IssuedBy('http://eterelz.fr/api'),
                    new LooseValidAt($clock),
                    new SignedWith($configJWT->signer(), $configJWT->verificationKey()),
                ];

                if (! $configJWT->validator()->validate($token, ...$constraints)) {
                   throw new Exception('Contrainte du JWT incorrecte');
                } else {
                    $this->id = $token->claims()->get('id');
                    $this->roles = $token->claims()->get('roles');
                    $this->username = $token->claims()->get('username');
                }

            } else {
                $this->id = 0;
                $this->roles= ['GUEST'];
                $this->username = 'GUEST';
            }
        }

        public function getId(): ?int
        {
            return $this->id;
        }
        public function getRoles(): ?array
        {
            return $this->roles;
        }

        public function getUsername(): ?string
        {
            return $this->username;
        }
    }
