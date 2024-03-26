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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('neighborhood');
            $table->string('res');
            $table->string('invent_num');
            $table->date('date_of_excavation');
            $table->date('date_recovery_ABP');
            $table->bigInteger('open_square');
            $table->string('street_type');
            $table->string('type_of_work');
            $table->string('address');
            $table->string('direction');
            $table->boolean('is_deleted')->default(false);
            $table->boolean('is_done')->default(false);
            $table->date('deleted_at')->nullable();
            $table->string('square_restored_area')->nullable();
            $table->text('image1')->nullable();
            $table->text('image2')->nullable();
            $table->text('image3')->nullable();
            $table->text('image4')->nullable();
            $table->text('image5')->nullable();
            $table->text('image6')->nullable();
            $table->text('claim_photo')->nullable();
            $table->date('date_of_sign')->nullable();
            $table->date('date_of_sending')->nullable();
            $table->date('date_of_fixing')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
