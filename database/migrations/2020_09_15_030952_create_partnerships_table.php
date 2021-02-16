<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnershipsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $table = 'partnerships';

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
            $table->unsignedBigInteger('merchant_id');
            $table->unsignedBigInteger('status_id');
            $table->BigInteger('discount_value');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
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
