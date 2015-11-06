<?php

namespace ToDo\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * NoteBook
        */
        $this->app->bind('ToDo\Contracts\NoteBookRepositoryInterface', 'ToDo\Repositories\NoteBookRepository');
        $this->app->bind('ToDo\Contracts\NoteBookServiceInterface', 'ToDo\Services\NoteBookService');

        /**
         * Task
        */
        $this->app->bind('ToDo\Contracts\TaskRepositoryInterface', 'ToDo\Repositories\TaskRepository');
        $this->app->bind('ToDo\Contracts\TaskServiceInterface', 'ToDo\Services\TaskService');        
    }
}
