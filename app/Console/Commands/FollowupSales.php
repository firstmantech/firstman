<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Sale;
use DB;
use Carbon\Carbon;
use App\Notification;
use App\Mail\SendNotification;
use Auth;
use Mail;
use App\User;

class FollowupSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'followup:sales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Followup Notifications to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now()->format('Y-m-d');
        $now1 = Carbon::now()->format('h:i');

        $start = $now1.':00';
        $end = $now1.':59';
        
        $follows = DB::table('sales')->whereBetween('next_follow_date', [$now, $now])
        ->whereBetween('next_follow_time', [$start, $end])
        ->where('status', '=', 'Follow up')
        ->get();

        foreach ($follows as $follow) {
            $notification = new Notification;
            $notification->sale_id = $follow->id;
            $notification->user_id = $follow->created_by;
            $notification->next_follow_date = $follow->next_follow_date;
            $notification->next_follow_time = $follow->next_follow_time;
            $notification->status = 'To Follow';
            $notification->save();

            Mail::to('ganesht8686@gmail.com')->send(new SendNotification($notification));
        }

    }
}
