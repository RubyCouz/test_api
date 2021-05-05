<?php
namespace EterelzApi\Type;

use EterelzApi\AppContext;
//use GraphQL\Examples\Blog\Data\DataSource;
use EterelzApi\Types;
use EterelzApi\Data\EterUsers;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class QueryType extends ObjectType
{
    private $em;

    public function __construct()
    {
        require "./bootstrap.php";
        $this->em = $entityManager;

        $config = [
            'name' => 'Query',
            'fields' => [
                'user' => [
                    'type' => Types::user(),
                    'description' => 'Returns user by id',
                    'args' => [
                        'id' => Types::nonNull(Types::id())
                    ]
                ],
                'connect' => [
                    'type' => Types::string(),
                    'description' => 'Returns token',
                    'args' => [
                        'mail' => Types::nonNull(Types::string()),
                        'password' => Types::nonNull(Types::string())
                    ]
                ],
                'deprecatedField' => [
                    'type' => Types::string(),
                    'deprecationReason' => 'This field is deprecated!'
                ],
                'fieldWithException' => [
                    'type' => Types::string(),
                    'resolve' => function() {
                        throw new \Exception("Exception message thrown in field resolver");
                    }
                ],
                'hello' => Type::string()
            ],
            'resolveField' => function($rootValue, $args, $context, ResolveInfo $info) {
                return $this->{$info->fieldName}($rootValue, $args, $context, $info);
            }
        ];
        parent::__construct($config);
    }

    public function user($rootValue, $args)
    {
        return $this->em->getRepository('EterelzApi\Data\EterUsers')->find($args['id']);
    }

    public function viewer($rootValue, $args, AppContext $context)
    {
        return $context->viewer;
    }

    /*public function stories($rootValue, $args)
    {
        $args += ['after' => null];
        return DataSource::findStories($args['limit'], $args['after']);
    }

    public function lastStoryPosted()
    {
        return DataSource::findLatestStory();
    }*/

    public function hello()
    {
        return 'Your graphql-php endpoint is ready! Use GraphiQL to browse API';
    }

    public function deprecatedField()
    {
        return 'You can request deprecated field, but it is not displayed in auto-generated documentation by default.';
    }

    public function connect($rootValue, $args, AppContext $context)
    {
        $user = $this->em->getRepository('EterelzApi\Data\EterUsers')
            ->findOneBy(array('user_mail' => $args['mail']));
        
        $accountVerified = $user->getConnect($args['password']);

        $badOrNotBad = $accountVerified ? "Connection possible":"Connection impossible";

        return $badOrNotBad;
    }
}
