<?php
/**
 * Created by PhpStorm.
 * User: novobi
 * Date: 4/5/2019
 * Time: 3:40 PM
 */

namespace App\GraphQL\Query;

use App\Author;
use Folklore\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\Type;

class AuthorByIdQuery extends Query
{
    protected $attributes = [
        'name' => 'author'
    ];

    public function type()
    {
        return GraphQL::type('author');
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
        $author = Author::find($args['id']);
        if (!$author) {
            throw new \InvalidArgumentException("Author Not Found");
        }
        return $author;
    }
}