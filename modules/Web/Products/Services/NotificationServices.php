<?php

namespace Web\Products\Services;

use Web\Products\Jobs\SendNewNotificationJob;
use Web\Products\Models\Product;
use Web\User\Database\Repositories\Contracts\UserRepositoryInterface;

class NotificationServices
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * send new product notification to admins
     * @param Product $product
     * @return void
     */
    public function sendNewProductNotificationToAdmin(Product $product)
    {
       $adminUsers = $this->userRepository->getAllAdmins();

       foreach ($adminUsers as $adminUser)
           SendNewNotificationJob::dispatch($adminUser , $product);
    }
}
