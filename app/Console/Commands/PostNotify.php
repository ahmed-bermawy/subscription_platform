<?php

namespace App\Console\Commands;

use App\Jobs\SendMail;
use App\Models\Post;
use Illuminate\Console\Command;

class PostNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:notify {post_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification to subscriber';

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
     * @return void
     */
    public function handle()
    {
        try {
            $post_id = $this->argument('post_id');
            $post = Post::find($post_id);
            if ($post) {
                if ($post->notify == 0) {
                    dispatch(new SendMail($post));
                    $post->update(['notify' => 1]);
                    return $this->info('Notification Sent successfully');

                } else {
                    return $this->error('Notification Already Sent');
                }
            } else {
                return $this->error('Post Not Found! ');
            }
        } catch (\Exception $e) {
            return $this->error('Something Error');

        }
    }
}
