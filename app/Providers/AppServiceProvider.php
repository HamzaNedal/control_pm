<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
        //URL::forceScheme('https');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $googleMail = Setting::where('key','googleMail')->first();
        config(['mail.mailers.smtp.username'=>$googleMail->email]);
        config(['mail.mailers.smtp.password'=>$googleMail->password]);
        config(['mail.from.name'=>$googleMail->name]);
        config(['mail.from.address'=>$googleMail->email]);

        Validator::extend('max_uploaded_file_size', function ($attribute, $value, $parameters, $validator) {

            $total_size = array_reduce($value, function ( $sum, $item ) {
                // each item is UploadedFile Object
                $sum += filesize($item->path());
                return $sum;
            });

            // $parameters[0] in kilobytes
            return $total_size < $parameters[0] * 1024;

        }, 'The size should be at most 5 MB');
    }
}
