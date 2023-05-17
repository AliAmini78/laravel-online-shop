<?php

namespace Web\Products\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Web\Products\Models\Product;
use Web\User\Models\User;

class SendNewNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;

    public Product $product;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user ,Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->sendNewProductNotification($this->product);
    }
}
