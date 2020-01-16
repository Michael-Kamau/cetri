<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class RegisterLoginTest extends DuskTestCase
{
use RefreshDatabase;

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function a_user_can_register()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'Michael')
                ->type('email', 'mk_kamau@charmax1.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->press('Register')
                ->assertPathIs('/home');
        });
    }


    /** @test */
    public function a_user_can_login()
    {
        factory(User::class)->create();

        $this->browse(function (Browser $browser) {
            $browser->LoginAs(User::find(1))
                ->visit('/login')
                ->assertSee('Blog posts');
        });
    }

}
