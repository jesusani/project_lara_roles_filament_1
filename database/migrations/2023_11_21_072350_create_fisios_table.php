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
        Schema::create('fisios', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable()->default(0);;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name', 100)->nullable()->default('text');
            $table->string('apellidos', 100)->nullable()->default('text');
            $table->integer('col_num')->nullable()->default(1);
            $table->string('dni', 100)->nullable()->default('text');
            $table->string('ccc', 100)->nullable()->default('text');

            $table->date('fecha_nato')->nullable()->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fisios');
    }
};
