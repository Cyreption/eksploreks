<?php

// Author: Nashita Aulia (5026231054)

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
        Schema::table('messages', function (Blueprint $table) {
            // Make chat_id nullable for direct messaging (not using chat rooms)
            if (Schema::hasColumn('messages', 'chat_id')) {
                $table->unsignedBigInteger('chat_id')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            // Revert back to NOT NULL
            if (Schema::hasColumn('messages', 'chat_id')) {
                $table->unsignedBigInteger('chat_id')->nullable(false)->change();
            }
        });
    }
};
