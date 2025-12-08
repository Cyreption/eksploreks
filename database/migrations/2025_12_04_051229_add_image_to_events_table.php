<?php

// Author: Hafizhan Yusra Sulistyo (5026231060)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('image', 255)->nullable()->after('file_link');
            // nullable = boleh kosong
            // after('file_link') = letaknya setelah kolom file_link (rapi)
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};