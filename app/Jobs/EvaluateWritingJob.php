<?php

namespace App\Jobs;

use App\ExamAnswer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EvaluateWritingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $examAnswerId;

    public function __construct($examAnswerId)
    {
        $this->examAnswerId = $examAnswerId;
    }

    public function handle()
    {
        //
    }
}