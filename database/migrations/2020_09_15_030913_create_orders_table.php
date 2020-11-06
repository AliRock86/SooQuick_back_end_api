<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $table = 'orders';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('merchant_id');
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
            $table->unsignedBigInteger('delivery_comp_id');
            $table->foreign('delivery_comp_id')->references('id')->on('delivery_companies')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('delivery_price_id')->default(0);
            $table->bigInteger('product_price')->default(0);
            $table->longText('serial_number');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->longText('order_description')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
