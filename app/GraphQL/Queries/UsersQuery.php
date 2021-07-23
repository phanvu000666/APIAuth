<?php
// app/GraphQL/Queries/UsersQuery.php

namespace App\GraphQL\Queries;

use GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL\Type\Definition\Type;
use App\User;

class UsersQuery extends Query {

    protected $attributes = [
        'name'  => 'users',
    ];
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
    }
    public function resolve($root, $args)
    {
        return User::all();
    }
}
