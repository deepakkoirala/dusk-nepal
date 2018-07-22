Here, I have made a little tests for recharging my mobile with the help of laravel dusk through esewa and khalti.

To do it yourself, clone this application using git here.

Now,

composer install
Copy .env.example file to .env

php artisan key:generate
Set appropriate username and password in .env file.

Now, run,

php artisan dusk tests/Browser/RechargeWithKhaltiTest.php // to recharge with Khalti
php artisan dusk tests/Browser/RechargeWithEsewaTest.php // to recharge with Esewa
That is all there is for now.