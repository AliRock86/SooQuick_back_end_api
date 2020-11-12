<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryCompaniesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $table = 'delivery_companies';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('delivery_comp_barnd_name');
            $table->string('delivery_comp_email',191)->nullable()->default(null);
            $table->bigInteger('delivery_comp_phone');
            $table->unique('delivery_comp_phone');
            $table->longText('delivery_comp_description')->nullable()->default(null);
            $table->unsignedBigInteger('status_id');
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
