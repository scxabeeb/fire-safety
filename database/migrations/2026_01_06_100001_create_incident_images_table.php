<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (
            Schema::hasTable('incident_images') &&
            !Schema::hasColumn('incident_images', 'category')
        ) {
            Schema::table('incident_images', function (Blueprint $table) {
                $table->string('category')
                      ->default('general')
                      ->after('image_path');
            });
        }
    }

    public function down(): void
    {
        if (
            Schema::hasTable('incident_images') &&
            Schema::hasColumn('incident_images', 'category')
        ) {
            Schema::table('incident_images', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }
    }
};