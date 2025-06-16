<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;
use App\Models\LoginLog;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        $agent = new Agent();

        LoginLog::create([
            'user_id' => $event->user->id,
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
            'device' => $agent->device(),
            'platform' => $agent->platform() . ' ' . $agent->version($agent->platform()),
            'browser' => $agent->browser() . ' ' . $agent->version($agent->browser()),
        ]);
    }
}

