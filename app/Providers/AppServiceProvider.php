<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('max_uploaded_file_size', function ($attribute, $value, $parameters, $validator) {

            $total_size = array_reduce($value, function ( $sum, $item ) { 
                // each item is UploadedFile Object
                $sum += filesize($item->path()); 
                return $sum;
            });
    
            // $parameters[0] in kilobytes
            return $total_size < $parameters[0] * 1024; 
    
        }, 'The size should be 5 MB');
    }
}
