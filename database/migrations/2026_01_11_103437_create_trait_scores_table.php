<?php

use App\Models\Term;
use App\Models\User;
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
        Schema::create('trait_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignId('trait_id');
            $table->foreignIdFor(Term::class);
            $table->foreignId('academic_year_id');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trait_scores');
    }
};
