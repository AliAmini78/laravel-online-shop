<?php

namespace Web\Products\Tests\Feature;

use Tests\TestCase;
use Web\Products\Models\Product;
use Web\User\Models\User;

class ProductTest extends TestCase
{
    /**
     * testing store new product
     */
    public function test_store_product(): void
    {
        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('product.store') , [
            "title" => "test",
            "price" => 2,
            "count" => 1
        ]);

        $this->assertDatabaseHas('products', [
            'title' => 'test',
            'price' => 2,
            'count' => 1,
        ]);

        $response->assertRedirect(route('product.index'));

        $adminUser->delete();

    }

    public function test_store_product_validation():void{

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('product.store') , [
            "title" => "test",
            "price" => 2,
            "count" => 1
        ]);
        $response->assertSessionHasNoErrors()
            ->assertStatus(302);
    }

    /**
     * test null title error
     * @return void
     */
    public function test_store_product_title_null_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('product.store'), [
            "title" => null,
            "price" => 2,
            "count" => 1
        ]);
        $response->assertSessionHasErrors('title')->assertStatus(302);

    }

    /**
     * test null price error
     * @return void
     */
    public function test_store_product_price_null_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('product.store'), [
            "title" => 'test',
            "price" => null,
            "count" => 1
        ]);
        $response->assertSessionHasErrors('price')->assertStatus(302);

    }

    /**
     * test negative price error
     * @return void
     */
    public function test_store_product_price_negative_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('product.store'), [
            "title" => "test",
            "price" => -20,
            "count" => 1
        ]);
        $response->assertSessionHasErrors('price')->assertStatus(302);

    }

    /**
     * test null count error
     * @return void
     */
    public function test_store_product_count_null_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('product.store'), [
            "title" => "test",
            "price" => 2,
            "count" => null
        ]);
        $response->assertSessionHasErrors('count')->assertStatus(302);

    }

    /**
     * test negative count error
     * @return void
     */
    public function test_store_product_count_negative_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $response = $this->post(route('product.store'), [
            "title" => "test",
            "price" => 2,
            "count" => -20
        ]);
        $response->assertSessionHasErrors('count')->assertStatus(302);

    }

    /**
     * testing normal user access to store product
     * @return void
     */
    public function test_normal_user_access_store_product() : void{
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('product.store'));

        $response->assertRedirectToRoute('home');

    }

    public function test_update_product_validation():void{

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $product = Product::factory()->create();

        $response = $this->put(route('product.update' , ['product' => $product]) , [
            "title" => "test",
            "price" => 2,
            "count" => 1
        ]);
        $response->assertSessionHasNoErrors()
            ->assertStatus(302);
    }

    /**
     * test null title error
     * @return void
     */
    public function test_update_product_title_null_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $product = Product::factory()->create();

        $response = $this->put(route('product.update' , ['product' => $product]) , [
            "title" => null,
            "price" => 2,
            "count" => 1
        ]);
        $response->assertSessionHasErrors('title')->assertStatus(302);

    }

    /**
     * test null price error
     * @return void
     */
    public function test_update_product_price_null_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $product = Product::factory()->create();

        $response = $this->put(route('product.update' , ['product' => $product]) , [
            "title" => 'test',
            "price" => null,
            "count" => 1
        ]);
        $response->assertSessionHasErrors('price')->assertStatus(302);

    }

    /**
     * test negative price error
     * @return void
     */
    public function test_update_product_price_negative_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $product = Product::factory()->create();

        $response = $this->put(route('product.update' , ['product' => $product]) , [
            "title" => "test",
            "price" => -20,
            "count" => 1
        ]);
        $response->assertSessionHasErrors('price')->assertStatus(302);

    }

    /**
     * test null count error
     * @return void
     */
    public function test_update_product_count_null_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $product = Product::factory()->create();

        $response = $this->put(route('product.update' , ['product' => $product]) , [
            "title" => "test",
            "price" => 2,
            "count" => null
        ]);
        $response->assertSessionHasErrors('count')->assertStatus(302);

    }

    /**
     * test negative count error
     * @return void
     */
    public function test_update_product_count_negative_error():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $product = Product::factory()->create();

        $response = $this->put(route('product.update' , ['product' => $product]) , [
            "title" => "test",
            "price" => 2,
            "count" => -20
        ]);
        $response->assertSessionHasErrors('count')->assertStatus(302);

    }

    /**
     * testing normal user access to store product
     * @return void
     */
    public function test_normal_user_access_update_product() : void{
        $user = User::factory()->create();

        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->put(route('product.update' , ['product' => $product]));

        $response->assertRedirectToRoute('home');

    }

    /**
     * test negative count error
     * @return void
     * @throws \JsonException
     */
    public function test_delete_product():void
    {

        $adminUser = User::factory()->create([
            'is_admin' => 1,
        ]);

        $this->actingAs($adminUser);

        $product = Product::factory()->create();

        $response = $this->delete(route('product.destroy' , ['product' => $product]));

        $response->assertSessionHasNoErrors()
            ->assertStatus(302);

    }

    /**
     * testing normal user access to store product
     * @return void
     */
    public function test_normal_user_access_delete_product() : void{
        $user = User::factory()->create();

        $this->actingAs($user);

        $product = Product::factory()->create();

        $response = $this->put(route('product.destroy' , ['product' => $product]));

        $response->assertRedirectToRoute('home');

    }
}
