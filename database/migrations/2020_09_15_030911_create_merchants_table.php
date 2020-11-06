<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $table = 'merchants';

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
            $table->string('merchant_barnd_name');
            $table->string('merchant_email',191)->nullable()->default(null);
            $table->bigInteger('merchant_phone');
            $table->unique('merchant_phone');
            $table->longText('merchant_description')->nullable()->default(null);
            $table->text('facebook_url')->nullable()->default(null);
            $table->boolean('offer')->default(false);
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
