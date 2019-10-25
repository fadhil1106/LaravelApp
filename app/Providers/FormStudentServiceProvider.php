<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classe;
use App\Hobbie;

class FormStudentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('student.form', function ($view) {
            $view->with('class_list',Classe::pluck('nama_kelas','id'));
            $view->with('hobbie_list',Hobbie::pluck('nama_hobi', 'id'));
        });

        view()->composer('student.form_searching', function ($view){
            $view->with('class_list',Classe::pluck('nama_kelas','id'));
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
