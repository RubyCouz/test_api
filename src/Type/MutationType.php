<?php
namespace EterelzApi\Type;

use EterelzApi\AppContext;
use EterelzApi\Types;
use EterelzApi\Data\EterUsers;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class MutationType extends ObjectType
{
    private $em;

    public function __construct()
    {
        require "./bootstrap.php";
        $this->em = $entityManager;

        $config = [
            'name' => 'Mutation',
            'fields' => [
                'RegisterAccount' => [
                    'type' => Type::int(),
                    'args' => [
                        'mail' => ['type' => Type::string()],
                        'login' => ['type' => Type::string()],
                        'password' => ['type' => Type::string()]
                    ],
                    'resolve' => function ($calc, $args) {
                        $user = new EterUsers();

                        $user->setUserLogin($args['login']);
                        $user->setUserMail($args['mail']);
                        $user->setUserPassword($args['password']);

                        $user->setUserDateInscr();

                        $this->em->persist($user);
                        $this->em->flush();

                        return $user->getUserId();
                    },
                ],
            ],
        ];
        parent::__construct($config);
    }

    public function user($rootValue, $args)
    {
        return $this->em->getRepository('EterelzApi\Data\EterUsers')->find($args['id']);
    }


}
