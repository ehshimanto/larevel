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
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('income_id');
            $table->string('income_title',50) ->unique();
            $table->string('income_category',200) ->nullable();
            $table->integer('income_amount') ->nullable();
            $table->integer('income_creator') ->nullable();
            $table->integer('income_editor') ->nullable();
            $table->string('income_slug',200) ->nullable();
            $table->string('income_status') ->default(1);
            $table->string('income_date') ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
