<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('product id');
            $table->string('name')->comment('product name');
            $table->decimal('price', 10, 2)->comment('product price')->default(0);
            $table->string('type')->comment('product type')->default('goods');
            $table->boolean('status')->comment('product status')->default(0);
            $table->unsignedBigInteger('user_id')->comment('user id');
            $table->timestamps();
            $table->softDeletes()->comment('deleted_at');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
