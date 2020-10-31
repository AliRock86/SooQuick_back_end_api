<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferredOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $table = 'transferred_orders';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('from_comp_id');
            $table->foreign('from_comp_id')->references('id')->on('delivery_companies')->onDelete('cascade');
            $table->unsignedBigInteger('to_comp_id');
            $table->foreign('to_comp_id')->references('id')->on('delivery_companies')->onDelete('cascade');
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
