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
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mbti_type', 4); // INFJ, ENTP gibi
            $table->integer('e_score')->default(0);
            $table->integer('i_score')->default(0);
            $table->integer('s_score')->default(0);
            $table->integer('n_score')->default(0);
            $table->integer('t_score')->default(0);
            $table->integer('f_score')->default(0);
            $table->integer('j_score')->default(0);
            $table->integer('p_score')->default(0);
            $table->string('report_path')->nullable();
            $table->string('payment_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};
