<?php

namespace App\Providers;

use App\Interfaces\TeachersRepositoryInterface;
use App\Interfaces\StudentsRepositoryInterface;
use App\Repositories\StudentsRepository;
use App\Repositories\TeachersRepository;
use Dotenv\Repository\RepositoryBuilder;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StudentsRepositoryInterface::class, StudentsRepository::class);
        $this->app->bind(TeachersRepositoryInterface::class, TeachersRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
