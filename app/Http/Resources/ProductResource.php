<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{


    /**
     * @var mixed|string
     */
    private mixed $func;

    public function __construct($resource, $type='index'){
        parent::__construct($resource);
        $this->resource = $resource;
        $this->func = $type;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->func == 'show') {
            return [
                'message' => 'Product retrieved successfully!',
                'status' => 'success',
                'data' => [
                    'product_id'=>$this->id,
                    'name' => $this->name,
                    'price' => $this->price,
                    'status' => $this->status,
                    'type' => $this->type,
                    'user' => [
                        'name' => $this->user->name,
                        'email' => $this->user->email,
                        'id' => $this->user->id,
                    ],
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                    'logs' => $this->actions->map(function ($action) {
                        return [
                            'id' => $action->id,
                            'data' => json_decode($action->data, true),
                            'user' => $action->user->name . ' | ' . $action->user->email,
                            'action' => $action->action,
                            'created_at' => $action->created_at,
                            'updated_at' => $action->updated_at,
                        ];
                    })
                ],
                'links' => [
                    'self' => route('products.show', $this->id),
                ],
            ];
        } else {
            return [
                'message' => 'Products retrieved successfully!',
                'status' => 'success',
                'data' =>[
                    'name' => $this->name,
                    'price' => $this->price,
                    'status' => $this->status,
                    'type' => $this->type,
                    'user' => $this->user->name . ' | ' . $this->user->email,
                    'detail' => [
                        'href' => route('products.show', $this->id),
                        'method' => 'GET',
                    ],

                ],
            ];
        }
    }
}
