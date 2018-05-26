<?php

namespace App\Jobs;

use App\User;
use Illuminate\Support\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StatusChecker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('status', 1)->get();

        foreach ($users as $user) {

            $difference = $user->updated_at->diffInMinutes(Carbon::now());
            
            if ($difference > 5) {
                $user->status = 0;
                $user->save();
            }
        }
    }
}
