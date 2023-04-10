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
        Schema::table('approving_assignings', function (Blueprint $table) {
        
        $table->foreignId('user_id')->constrained()->references('id')->on('user_lists')->onDelete('cascade')->onUpdate('cascade');
        $table->foreignId('req_id')->constrained()->references('id')->on('requests_p_o_s')->onDelete('cascade')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
