<?php
namespace EterelzApi;

use EterelzApi\JWT\UsersJWT;

/**
 * Instance available in all GraphQL resolvers as 3rd argument
 */
class AppContext
{
    /*
      @var string
     */
    public $rootUrl;

    /*
      @var UsersJWT
     */
    public $viewer;

    /*
      @var \mixed
     */
    public $request;
}