<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RechargeWithKhaltiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testKhaltiWillRechargeMyBalance()
    {
        $this->browse(function (Browser $browser) {
            $username = env('KHALTI_USERNAME');
            $password = env('KHALTI_PASSWORD');

            $browser->visit('https://khalti.com')
                ->pause(1000)
                ->click('li a button.popup')
                ->pause(1000)
                ->type('#login-component .field [type=text]',$username)
                ->type('#login-component .field [type=password]', $password)
                ->click('#login-component [type=submit]')
                ->pause(2000);

            $browser->visit('https://khalti.com/#/service/topup/')
                ->pause(2000)
                ->type('.sixteen.wide.mobile.eight.wide.computer.column [type=text]',$username)
                ->pause(1000)
                ->click('.sixteen.wide.mobile.eight.wide.computer.column .selection')
                ->pause(1000)
                ->click('.visible.menu div:nth-child(1)')
                ->pause(1000)
                ->click('[data-component=ServiceSubmitButton]')
                ->pause(1000)
                ->click('.basic.buttons button:nth-child(2)')
                ->pause(3000);
        });
    }
}
