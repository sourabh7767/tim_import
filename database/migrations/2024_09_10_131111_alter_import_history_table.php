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
        Schema::table('import_history', function (Blueprint $table) {
            $table->tinyInteger('type')->comment('1=>mobile, 2=>Admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('import_history', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
