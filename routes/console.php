<?php

use Carbon\Carbon;
use App\Models\Message;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    $messages = Message::where('created_at', '<', Carbon::now()->subDays(1))->get();
    foreach ($messages as $message) {
        if ($message->image) {
            Storage::disk('public_disk')->delete($message->image);
        }
        $message->delete();
    }
})->hourly();
