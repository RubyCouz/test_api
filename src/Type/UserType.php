<?php
namespace EterelzApi\Type;

use EterelzApi\AppContext;
use EterelzApi\Data\EterUsers as User;
use EterelzApi\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class UserType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'User',
            'description' => 'Our blog authors',
            'fields' => function() {
                return [
                    'id' => Types::id(),
                    'mail' => Types::string(),
                    'login' => Types::string(),
                    //"dateInscr" => Types::DateTime(),
                    'address' => Types::string(),
                ];
            },
            'interfaces' => [
                Types::node()
            ],
            'resolveField' => function($user, $args, $context, ResolveInfo $info) {
                $method = 'getUser' . ucfirst($info->fieldName);
                if (method_exists($user, $method)) {
                    return $user->{$method}($user, $args, $context, $info);
                }
            }
        ];
        parent::__construct($config);
    }

}
