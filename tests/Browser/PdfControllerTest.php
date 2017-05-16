<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class PdfControllerTest
 *
 * @package Tests\Browser
 */
class PdfControllerTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test users are converted to pdf correctly
     *
     * @return void
     */
    public function test_users_are_converted_to_pdf_correctly()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/users/pdf')
                    ->assertSee('todo');
        });
    }

    /**
     * Test a user are converted to pdf correctly
     *
     * @group failing
     * @return void
     */
    public function test_user_is_converted_to_pdf_correctly()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/pdf/1');
        });
    }

    /**
     * Create users
     *
     * @param null $num
     */
    private function createUsers($num = null)
    {
        return factory(User::class, $num)->create();
    }

    /**
     * Test users are converted to pdf correctly
     *
     * failing1
     * @return void
     */
    public function test_users_are_show_correctly()
    {
        $users = $this->createUsers(25);

        $this->browse(function (Browser $browser) use ($users) {
            $browser->visit('/user/pdf/view');

            // CS Selectors
            $this->assertEquals(2, count($browser->elements('div#users-list table#users-table-list tr th')));
            $this->assertEquals(25, count($browser->elements('div#users-list table#users-table-list tr')));
        });
    }

    /**
     * Test a user are converted to pdf correctly
     *
     * @return void
     */
    public function test_users_is_show_correctly()
    {
        $user = $this->createUsers();

        $this->browse(function (Browser $browser) use ($user){
            $browser->visit('/user/pdf/' . $user->id)
            ->assertSee($user->name)
            ->assertSee($user->email);
        });
    }
}
