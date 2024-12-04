<?php
namespace App\Facades;

use App\Services\GreetingService;
use Illuminate\Support\Facades\Facade;

class Greet extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GreetingService::class;
    }
}
