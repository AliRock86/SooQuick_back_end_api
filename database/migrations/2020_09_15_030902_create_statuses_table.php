<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $table = 'statuses';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('status_type_id');
            $table->foreign('status_type_id')->references('id')->on('status_types')->onDelete('cascade');
            $table->string('status_name');
            $table->string('status_name_ar');
            $table->string('status_color')->nullable()->default(null);
            $table->string('status_icon')->nullable()->default(null);
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
