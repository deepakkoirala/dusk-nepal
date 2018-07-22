<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RechargeWithEsewaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEsewaWillRechargeMyBalance()
    {
        $this->browse(function (Browser $browser) {
            $username = env('ESEWA_USERNAME');
            $password = env('ESEWA_PASSWORD');

            $browser->visit('https://esewa.com.np')
            ->type('.loginPart .form-control[name=username]',$username)
            ->type('.loginPart .form-control[name=password]', $password)
            ->click('.loginPart [type=submit]')
            ->pause(1000);

            $browser->visit('https://esewa.com.np/#/make_payment/NTNAM/NT%20Prepaid%20Topup')
            ->pause(1500)
            ->type('#mobileNo',$username)
            ->select('#amount',10)
            ->pause(2000)
            ->click('#proceedfundTransferPayment')
            ->pause(3000)
            ->click('div.payment-box .ng-scope .theme_box .btn-green')
            ->pause(3000);
        });
    }
}
