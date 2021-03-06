<?php


namespace App\GraphQL\Mutation;

use App\Author;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteAuthorMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAuthor'
    ];

    public function type()
    {
        return Type::int();
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Author::destroy($args['id']) > 0 ? $args['id'] : null;
    }
}