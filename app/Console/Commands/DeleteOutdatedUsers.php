<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteOutdatedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dittmeier:delete-outdated-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete already soft deleted users after specifed period of time.';

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
     * @return int
     */
    public function handle()
    {
        $this->line(__($this->description));

        /*$this->table(
            ['ID', 'Name', 'Email'],
            User::all(['id', 'name', 'email'])->toArray()
        );*/

        // $this->ask('whaaaat?', 0);

        $users = User::whereNotNull('deleted_at')
            ->where('deleted_at', '<=', now()->subWeek())->get();
        foreach ($users as $user) {
            $user->forceDelete();
        }
    }
}
