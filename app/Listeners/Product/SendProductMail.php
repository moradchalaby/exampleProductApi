<?php

namespace App\Listeners\Product;

use App\Events\Product\ProductCreated;
use App\Mail\Product\ProductNotifyMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProductMail implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated $event): void
    {
        $product = $event->product;
        $user = $event->product->user;
        $productName = $product->name;
        $productPrice= $product->price;
        $productType = $product->type;
        $productDate = $product->created_at;
        $userEmail = $user->email;
        $userName = $user->name;

        Mail::to($userEmail)->send(new ProductNotifyMail($productName,$userName, $productPrice, $productType, $productDate));
    }
}
