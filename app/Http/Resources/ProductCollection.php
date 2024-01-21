<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Products retrieved successfully!',
            'status' => 'success',
            'data' => $this->collection->transform(function ($product) {
                return [
                    'name' => $product->name,
                    'price' => $product->price,
                    'status' => $product->status,
                    'type' => $product->type,
                    'user' => $product->user->name . ' | ' . $product->user->email,
                    'details' => [
                        'href' => route('products.show', $product->id),
                        'method' => 'GET',
                    ],

                ];
            }),
            'meta' => [
                'pagination' => [
                    'total' => $this->total(),
                    'count' => $this->count(),
                    'per_page' => $this->perPage(),
                    'current_page' => $this->currentPage(),
                    'total_pages' => $this->lastPage(),
                    'links' => [
                        'next' => $this->nextPageUrl(),
                        'previous' => $this->previousPageUrl(),
                    ]
                ],
            ],


        ];
    }
}
