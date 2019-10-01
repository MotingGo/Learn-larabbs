<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SyncUserActivedAt extends Command
{
    protected $signature = 'larabbs:sync-user-actived-at';
    protected $description = 'Command description';

    public function handle(User $user)
    {
        $user->syncUserActivedAt();

        $this->info('同步成功！');
    }
}
