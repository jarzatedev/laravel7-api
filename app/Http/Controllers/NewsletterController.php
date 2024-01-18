<?php

namespace App\Http\Controllers;

use App\Console\Commands\SendNewsletterCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NewsletterController extends Controller
{
    public function send()
    {
        Artisan::call(SendNewsletterCommand::class);

        return response()->json([
            'data' => 'Todo ok'
        ]);
    }
}
