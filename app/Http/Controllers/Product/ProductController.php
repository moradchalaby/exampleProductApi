<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\FilterProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product\Product;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(FilterProductRequest $request): \Illuminate\Http\JsonResponse
    {

        try {
            $products = Product::with('user')
                ->when(count($request->all()) > 0, function ($query) use ($request) {
                    return $query->when($request->filled('name'), function ($q) use ($request) {
                        return $q->where('name', 'like', '%' . $request->name . '%');
                    })
                        ->when($request->filled('user_name'), function ($q) use ($request) {
                            return $q->where('user_name', 'like', '%' . $request->user_name . '%');
                        })
                        ->when($request->filled('user_email'), function ($q) use ($request) {
                            return $q->where('user_email', 'like', '%' . $request->user_email . '%');
                        });
                })
                ->where('status', $request->status ?? 1)
                ->paginate($request->per_page ?? 10);

            $data = new ProductCollection($products);

            if($products->count() == 0)
                return response()->json(['message' => 'Product not Found!','status'=>'No Content'], 204,['Location' => route('products.index')], JSON_PRETTY_PRINT);
            return response()->json($data, 200, ['Location'=>route('products.index')], JSON_PRETTY_PRINT);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Product not Found!','status'=>'error'], 500,['Location' => route('products.index')], JSON_PRETTY_PRINT);
        }


    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): \Illuminate\Http\JsonResponse
    {
        //
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->type = $request->type;
            $product->user_id = $request->user()->id;
            $product->save();
            $result = new ProductResource($product->load('user'));

            return response()->json($result, 201, ['Location' => route('products.show', ['product' => $product->id])], JSON_PRETTY_PRINT);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Product not created!','status'=>'error'], 500, ['Location' => route('products.store')], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): \Illuminate\Http\JsonResponse
    {
        try {
            $result = new ProductResource($product->load('user'),'show');
            return response()->json($result, 200, ['Location' => route('products.show', ['product' => $product->id])], JSON_PRETTY_PRINT);
        }
        catch (\Exception $e){
            return response()->json(['message' => 'Product not Found!','status'=>'error'], 500,['Location' => route('products.show')], JSON_PRETTY_PRINT);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): \Illuminate\Http\JsonResponse
    {
        try {
            $product->name = $request->name ?? $product->name;
            $product->price = $request->price ?? $product->price;
            $product->status = $request->status ?? $product->status;
            $product->type = $request->type ?? $product->type;
            $product->save();
            $result = new ProductResource($product->load('user'),'show');

            return response()->json($result, 200, ['Location' => route('products.show', ['product' => $product->id])], JSON_PRETTY_PRINT);
        }
        catch (\Exception $e){
            return response()->json(['message' => 'Product not Found!','status'=>'error'], 500,['Location' => route('products.update')], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): \Illuminate\Http\JsonResponse
    {
        try {
            $product->delete();
            return response()->json(['message' => 'Product deleted!','status'=>'success'], 200, ['Location' => route('products.index')], JSON_PRETTY_PRINT);
        }
        catch (\Exception $e){
            return response()->json(['message' => 'Product not Found!','status'=>'error'], 500,['Location' => route('products.destroy')], JSON_PRETTY_PRINT);
        }

    }


}
