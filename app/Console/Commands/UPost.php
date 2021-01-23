<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Business;

class UPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:upost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $business = Business::get();
        foreach ($business as $bus) {
            $busin = Business::where('id', $bus->id)->first();
            $busin->fb_posted_goals = 0;
            $busin->tw_posted_goals = 0;
            $busin->in_posted_goals = 0;
            $busin->gb_posted_goals = 0;
            $busin->daily_posted = 0;
            $busin->save();
        }

    }
}
