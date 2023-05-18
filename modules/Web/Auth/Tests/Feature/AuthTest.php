<?php

namespace Web\Auth\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Web\Products\Models\Product;
use Web\User\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * testing login
     */
    public function test_login(): void
    {
        // create a user to test login
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // visit the login page
        $response = $this->get(route('login'));

        // assert the login page is displayed
        $response->assertSuccessful();

        // submit the login form with valid credentials
        $response = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // assert the user is redirected to the home page after successful login
        $response->assertRedirect(route('home'));

        // assert the user is authenticated
        $this->assertAuthenticatedAs($user);

        // logout the user
        $this->post(route('logout'));

        // assert the user is logged out
        $this->assertGuest();

    }

    /**
     * test wrong email or password error
     * @return void
     */
    public function test_login_wrong_email_or_password_error(): void
    {
        // submit the login form with valid credentials
        $response = $this->post(route('login'), [
            'email' => "test12@gmail.com",
            'password' => 'password',
        ]);
        $response->assertStatus(302)->assertRedirectToRoute('login');
    }

    /**
     * test null email error
     * @return void
     */
    public function test_login_null_email_error(): void
    {
        // submit the login form with valid credentials
        $response = $this->post(route('login'), [
            'email' => null,
            'password' => 'password',
        ]);
        $response->assertSessionHasErrors('email')->assertStatus(302);
    }

    /**
     * test invalid email error
     * @return void
     */
    public function test_login_invalid_email_error(): void
    {
        // submit the login form with valid credentials
        $response = $this->post(route('login'), [
            'email' => "test.com",
            'password' => 'password',
        ]);
        $response->assertSessionHasErrors('email')->assertStatus(302);
    }

    /**
     * test null password error
     * @return void
     */
    public function test_login_null_password_error(): void
    {
        // submit the login form with valid credentials
        $response = $this->post(route('login'), [
            'email' => "test.com",
            'password' => null,
        ]);
        $response->assertSessionHasErrors('password')->assertStatus(302);
    }

    /**
     * test short password error
     * @return void
     */
    public function test_login_short_password_error(): void
    {
        // submit the login form with valid credentials
        $response = $this->post(route('login'), [
            'email' => "test.com",
            'password' => 1234,
        ]);
        $response->assertSessionHasErrors('password')->assertStatus(302);
    }

    /**
     * test register
     * @return void
     */
    public function test_register(): void {
        $userData = [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => '123qwe!@#QWE',
            'password_confirmation' => '123qwe!@#QWE',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertRedirectToRoute('home');
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    /**
     * test register null name error
     * @return void
     */
    public function test_register_null_name_error(): void {
        $userData = [
            'name' => null,
            'email' => 'test@example.com',
            'password' => '123qwe!@#QWE',
            'password_confirmation' => '123qwe!@#QWE',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('name');

    }

    /**
     * test register null email error
     * @return void
     */
    public function test_register_null_email_error(): void {
        $userData = [
            'name' => 'test',
            'email' => null,
            'password' => '123qwe!@#QWE',
            'password_confirmation' => '123qwe!@#QWE',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('email');

    }


    /**
     * test register invalid email error
     * @return void
     */
    public function test_register_invalid_email_error(): void {
        $userData = [
            'name' => 'test',
            'email' => "admin.com",
            'password' => '123qwe!@#QWE',
            'password_confirmation' => '123qwe!@#QWE',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('email');

    }


    /**
     * test register null password error
     * @return void
     */
    public function test_register_null_password_error(): void {
        $userData = [
            'name' => 'test',
            'email' => "admin.com",
            'password' => null,
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('password');

    }
    /**
     * test register simple password error
     * @return void
     */
    public function test_register_simple_password_error(): void {
        $userData = [
            'name' => 'test',
            'email' => "admin.com",
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('password');

    }

    /**
     * test register null confirm password error
     * @return void
     */
    public function test_register_null_confirm_password_error(): void {
        $userData = [
            'name' => 'test',
            'email' => "admin.com",
            'password' => '123qwe!@#QWE',
            'password_confirmation' => null,
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('password_confirmation');

    }
    /**
     * test register wrong confirm password error
     * @return void
     */
    public function test_register_wrong_confirm_password_error(): void {
        $userData = [
            'name' => 'test',
            'email' => "admin.com",
            'password' => '123qwe!@#QWE',
            'password_confirmation' => '123456789',
        ];

        $response = $this->post(route('register'), $userData);

        $response->assertSessionHasErrors('password_confirmation');

    }

    /**
     * test logout
     * @return void
     */
    public function test_logout(): void
    {
        $user = User::factory()->create();


        $this->actingAs($user);

        // logout the user
        $this->post(route('logout'));

        // assert the user is logged out
        $this->assertGuest();
    }


}
