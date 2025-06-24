<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use App\Models\MailSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

public function boot()
{
    if (Schema::hasTable('mail_settings')) {
        $settings = MailSetting::first();

        if ($settings) {
            Config::set('mail.mailers.smtp.host', $settings->host);
            Config::set('mail.mailers.smtp.port', $settings->port);
            Config::set('mail.mailers.smtp.username', $settings->username);
            Config::set('mail.mailers.smtp.password', $settings->password);
            Config::set('mail.mailers.smtp.encryption', $settings->encryption);
            Config::set('mail.from.address', $settings->from_address);
            Config::set('mail.from.name', $settings->from_name);
        }
    }
}

}
