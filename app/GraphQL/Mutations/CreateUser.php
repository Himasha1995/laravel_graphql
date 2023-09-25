<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User; // Import your User model or adjust the namespace as needed

final class CreateUser
{
    /**
     * @param  null  $_
     * @param  array  $args
     * @return array
     */
    public function __invoke($_, array $args): array
    {
        // Extract user input from args
        $input = [
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']), // You should hash the password
        ];

        // Create a new user
        $user = User::create($input);

        // Return the created user data
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
}
