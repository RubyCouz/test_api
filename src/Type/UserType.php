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
                    'email' => Types::string(),
                ];
            },
            'interfaces' => [
                Types::node()
            ],
            'resolveField' => function($user, $args, $context, ResolveInfo $info) {
                $method = 'resolve' . ucfirst($info->fieldName);
                if (method_exists($this, $method)) {
                    return $this->{$method}($user, $args, $context, $info);
                } else {
                    return $user->{$info->fieldName};
                }
            }
        ];
        parent::__construct($config);
    }

    public function resolveId(User $user)
    {
        return $user->getId();
    }

    public function resolveEmail(User $user)
    {
        return $user->getUserMail();
    }

}