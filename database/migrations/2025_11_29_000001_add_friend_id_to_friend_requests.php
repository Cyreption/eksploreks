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
        // Add friend_id column to friend_requests table if it doesn't exist
        if (Schema::hasTable('friend_requests') && !Schema::hasColumn('friend_requests', 'friend_id')) {
            Schema::table('friend_requests', function (Blueprint $table) {
                $table->unsignedInteger('friend_id')->nullable()->after('user_id');
                $table->foreign('friend_id')->references('user_id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('friend_requests') && Schema::hasColumn('friend_requests', 'friend_id')) {
            Schema::table('friend_requests', function (Blueprint $table) {
                $table->dropForeign(['friend_id']);
                $table->dropColumn('friend_id');
            });
        }
    }
};
