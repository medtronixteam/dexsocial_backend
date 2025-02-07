<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->call(function () {
        //     Log::info("status update");

        // $currentTime = Carbon::now('Asia/Jakarta')->format('H:i');
        // $currentDate = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        // $meetingGet = \App\Models\Meeting::where('status', 'started')->where('meeting_date', $currentDate);
        // if ($meetingGet->count() > 0) {
        //     $meetingData = $meetingGet->get();
        //     foreach ($meetingData as $key => $meeting) {
        //         @$ClassGroup = \App\Models\ClassGroup::where('id', $meeting->class_group_id)->first();
        //         if ($currentTime > $ClassGroup->class_end) {
        //             $status=['status' => 'finished'];
        //             $meetingUp = \App\Models\Meeting::find($meeting->id)->update($status);
        //         }

        //     }
        // }
        // })->everyMinute();

        $schedule->call(function () {
            Log::info("tesk 1");
            $currentTime = Carbon::now('Asia/Jakarta')->format('H:i');
            $currentDay = Carbon::now('Asia/Jakarta')->format('l');
            $currentDate = Carbon::now('Asia/Jakarta')->format('Y-m-d');
            $meetingGet = \App\Models\Meeting::where('meeting_date', $currentDate);
            $totalMeetings=$meetingGet->count();
            $ClassGroupet = \App\Models\ClassGroup::where('class_day', $currentDay);
            $totalGroups=$ClassGroupet->count();

            Log::info("tesk 1-".$totalMeetings);
            Log::info("tesk 2-".$totalGroups);
            if($totalGroups>$totalMeetings && lastMeetingLink()){
                Log::info("tesk run".$totalGroups);
                $meetingLastetData=lastMeetingLink();
                $ClassGroups = $ClassGroupet->orderBy('id', 'ASC')->get();
                $classGroupID=0;
                foreach ($ClassGroups as $ClassGroup):
                    $classGroupID++;
                    $Meeting = \App\Models\Meeting::where('meeting_date', $currentDate)->where('class_group_id', $ClassGroup->id);
                    if ($Meeting->count() < 1) {

                        \App\Models\Meeting::create([
                            'title' => $currentDate . " Meeting",
                            'meeting_date' => $currentDate,
                            'duration' => 60,
                            'meeting_id' => $meetingLastetData->meeting_id,
                            'branch_id' => $ClassGroup->branch_id,
                            'approval_type' => 0,
                            'class_group_id' => $ClassGroup->id,
                            'start_time' => $ClassGroup->class_start,
                            'end_time' => $ClassGroup->class_end,
                            'meeting_type' => 'instant',
                            'meeting_time' => $ClassGroup->class_start,
                            'meeting_link' => $meetingLastetData->meeting_link,
                            'start_url' => $meetingLastetData->meeting_link,
                            'password' => $meetingLastetData->password,
                            'status' => $meetingLastetData->status,
                            'room_name' =>"Room ".$classGroupID,
                        ]);
                    }
                endforeach;
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
