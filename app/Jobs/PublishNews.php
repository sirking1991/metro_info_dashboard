<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PublishNews implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private \App\News $news;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\App\News $news)
    {
        $this->news = $news;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->news->status = 'published';
        $this->news->save();

        if ('yes' == $this->news->broadcast) {
            // TODO: broadcast 
        }
    }
}
