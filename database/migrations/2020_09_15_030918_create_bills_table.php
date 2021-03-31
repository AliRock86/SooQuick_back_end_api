<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $table = 'bills';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Integer('order_number');
            $table->Integer('user_type');
            $table->bigInteger('delivery_cost');
            $table->unsignedBigInteger('delivery_comp_id');
            $table->foreign('delivery_comp_id')->references('id')->on('delivery_companies')->onDelete('cascade');
            $table->bigInteger('totlal_cost');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('status_id');
            $table->Integer('bill_type_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
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
