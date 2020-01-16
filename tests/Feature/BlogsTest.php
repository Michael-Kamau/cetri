<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Blog;
use App\User;

class BlogsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function only_logged_in_users_can_see_the_create_page()
    {
        $response = $this->get('/blogs/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_view_the_create_page(){
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/blogs/create')
            ->assertStatus(200);
    }


    /** @test */
    public function logged_in_users_can_add_new_blog(){
        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/blogs',[
            'title'=>'My Title',
            'user_id'=>Auth::user(),
            'content'=>'viewModal',

        ]);
        $this->assertCount(1,Blog::all());
    }


    /** @test  */
    public function deleting_blog_in_the_database()
    {
        $this->actingAs(factory(User::class)->create());

        $this->delete('blogs/82');
        $this->assertDatabaseMissing('blogs',['id' => 82]);
    }


}
