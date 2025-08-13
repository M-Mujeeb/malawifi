<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('profile_links', function (Blueprint $table) {
            // change JSON -> LONGTEXT (or TEXT). LONGTEXT is safer for bigger payloads.
            $table->longText('data')->nullable()->change();
        });
    }
    public function down(): void {
        Schema::table('profile_links', function (Blueprint $table) {
            // roll back to JSON if you need to
            $table->json('data')->nullable()->change();
        });
    }
};
