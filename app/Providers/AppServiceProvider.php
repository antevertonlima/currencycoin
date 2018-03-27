<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('pagination::bootstrap-4-custom');
        Paginator::defaultSimpleView('pagination::simple-bootstrap-4');

        \Form::macro('error', function ($field, $errors){
            if($errors->has($field)){
                return view('errors.error_field',compact('field'));
            }
            return null;
        });
        
        \Html::macro('openFormGroup',function ($field = null, $errors = null){
            $hasError = ($field != null && $errors != null && $errors->has($field)) ? ' has-error':'';
            return "<div class=\"form-group{$hasError}\">";
        });

        \Html::macro('closeFormGroup',function (){
            return "</div>";
        });

        \Html::macro('flashMessages',function ($message = null, $type = 'info'){
            return "<div class=\"alert alert-{$type} alert-dismissible fade show\" role=\"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span>
            </button>
            <strong>{$message}
          </div>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
