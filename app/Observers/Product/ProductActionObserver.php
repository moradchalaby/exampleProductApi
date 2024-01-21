<?php

namespace App\Observers\Product;

use App\Models\Product\ProductAction;
use Illuminate\Support\Facades\Auth;

class ProductActionObserver
{
    //
    public function saved($model)
    {
        if ($model->wasRecentlyCreated) {
            // Data was just created
            $action = 'created';
        } else {
            // Data was updated
            $action = 'updated';
        }
        if (Auth::check()) {

            ProductAction::create([
                'product_id'=> $model->id,
                'user_id'      => Auth::user()->id,
                'action'       => $action,
                'data'         => $model->toJson()
            ]);
        }
    }
    public function deleting($model)
    {
        if (Auth::check()) {
            ProductAction::create([
                'user_id'      => Auth::user()->id,
                'product_id'=> $model->id,
                'action'       => 'deleted',
                'data'         => $model->toJson()
            ]);
        }
    }

}
