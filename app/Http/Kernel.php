<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Add this to the $middleware array
    protected $middleware = [
        // ...existing middleware...
        \App\Http\Middleware\CheckMaintenance::class,
    ];
}