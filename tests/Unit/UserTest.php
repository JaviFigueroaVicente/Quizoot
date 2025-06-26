<?php

namespace Tests\Unit;

use App\Models\Formularios;
use App\Models\User;
use Illuminate\Routing\Route;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_login_user()
    {
        $this->get('/login');
        $credentials = [
            "email" => "admin@demo.com",
            "password" => "12345678"
        ];

        $this->post('/login', $credentials);
        $this->assertCredentials($credentials);
    }

    public function test_register_user()
    {
        $this->postJson('api/user', [
           'name' => 'Marc',
           'email' => 'marc@demo.com',
           'password' => '12345678',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Marc',
            'surname1' => '',
            'surname2' => '',
            'alias' => 'Marc',
            'email' => 'marc@demo.com',
        ]);

        $user = User::where('email', 'marc@demo.com')->first();
        $this->assertTrue($user->email == 'marc@demo.com');
    }

    public function test_show_user()
    {
        $user = User::where('email', 'marc@demo.com')->first();

        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson("api/users/{$user->id}");


        $response->assertJson([
            'data' => [
                'id' => $user->id,
                'name' => 'Marc',
                'alias' => 'Marc',
                'email' => 'marc@demo.com',
            ]
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Marc',
            'email' => 'marc@demo.com',
            'alias' => 'Marc',
        ]);

        $retrievedUser = User::where('email', 'marc@demo.com')->first();
        $this->assertNotNull($retrievedUser);
        $this->assertTrue($retrievedUser->name === 'Marc');
        $this->assertTrue($retrievedUser->email === 'marc@demo.com');
        $this->assertTrue($retrievedUser->alias === 'Marc');
    }

    // public function test_update_user()
    // {
    //     $user = User::where('email', 'marc@demo.com')->first();

    //     $token = $user->createToken('test-token')->plainTextToken;

    //     $updateUser = [
    //         'name' => 'Javi',
    //         'email' => 'javi@demo.com',
    //         'alias' => 'javiFigueroa',
    //         'surname1' => 'Figueroa'
    //     ];

    //     $response = $this->withHeaders([
    //         'Authorization' => 'Bearer ' . $token,
    //     ])->postJson("api/user/{$user->id}", $updateUser);

    //     // $response->assertStatus(200);

    //     $response->assertJson([
    //         'status' => 200,
    //         'success' => true,
    //         'data' => [
    //             'id' => $user->id,
    //             'name' => 'Javi',
    //             'surname1' => 'Figueroa',
    //             'alias' => 'javiFigueroa',
    //             'email' => 'javi@demo.com',
    //         ]
    //     ]);

    //     $this->assertDatabaseHas('users', [
    //         'id' => $user->id,
    //         'name' => 'Javi',
    //         'email' => 'javi@demo.com',
    //         'alias' => 'javiFigueroa',
    //         'surname1' => 'Figueroa'
    //     ]);

    //     $updatedUser = User::where('email', 'javi@demo.com')->first();
    //     $this->assertNotNull($updatedUser);
    //     $this->assertTrue($updatedUser->name === 'Javi');
    //     $this->assertTrue($updatedUser->alias === 'javiFigueroa');
    //     $this->assertTrue($updatedUser->surname1 === 'Figueroa');
    // }
    public function test_delete_user()
    {
        $user = User::where('email', 'marc@demo.com')->first();

        $this->assertNotNull($user);
        $user->delete();

        $deletedUser = User::where('email', 'marc@demo.com')->first();
        $this->assertNull($deletedUser);
    }
}
