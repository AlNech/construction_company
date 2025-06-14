<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('short_description', 300)->nullable();
        });
        Schema::table('services', function (Blueprint $table) {
            $table->string('icon', 300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('short_description');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
};
