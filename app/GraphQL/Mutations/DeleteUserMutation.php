<?php
// app/GraphQL/Mutations/DeleteUserMutation.php

namespace App\GraphQL\Mutations;

use GraphQL;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\User;


class DeleteUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteUser',
        'description' => 'Delete a user'
    ];
    
    public function type():type
    {
        return Type::boolean();
    }
    
    public function args():array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $user = User::findOrFail($args['id']);

        return  $user->delete() ? true : false;
    }
}
