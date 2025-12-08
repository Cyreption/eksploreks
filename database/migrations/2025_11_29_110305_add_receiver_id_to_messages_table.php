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
            // Add receiver_id column if it doesn't exist
            if (!Schema::hasColumn('messages', 'receiver_id')) {
                $table->unsignedInteger('receiver_id')->nullable()->after('sender_id');
                $table->foreign('receiver_id')
                    ->references('user_id')
                    ->on('users')
                    ->onDelete('cascade');
            }
            
            // Add message column if it doesn't exist (for direct messaging)
            if (!Schema::hasColumn('messages', 'message')) {
                $table->text('message')->nullable()->after('content');
            }
            
            // Add created_at column if it doesn't exist
            if (!Schema::hasColumn('messages', 'created_at')) {
                $table->timestamp('created_at')->nullable()->after('message');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            // Drop foreign key first
            if (Schema::hasColumn('messages', 'receiver_id')) {
                $table->dropForeign(['receiver_id']);
                $table->dropColumn('receiver_id');
            }
            
            if (Schema::hasColumn('messages', 'message')) {
                $table->dropColumn('message');
            }
            
            if (Schema::hasColumn('messages', 'created_at')) {
                $table->dropColumn('created_at');
            }
        });
    }
};
