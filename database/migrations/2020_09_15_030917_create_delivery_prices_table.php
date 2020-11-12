<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryPricesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $table = 'delivery_prices';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('delivery_comp_id');
            $table->foreign('delivery_comp_id')->references('id')->on('delivery_companies')->onDelete('cascade');
            $table->unsignedBigInteger('from_region_id');
            $table->foreign('from_region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->unsignedBigInteger('to_region_id');
            $table->foreign('to_region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->integer('delivery_price_value');
            $table->integer('delivery_price_weight_kilos')->nullable()->default(0);
            $table->string('delivery_prices_description')->nullable()->default(null);
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
