<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'vendor_join')) {
                $table->string('vendor_join')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'vendor_short_info')) {
                $table->text('vendor_short_info')->nullable()->after('vendor_join');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'vendor_short_info')) {
                $table->dropColumn('vendor_short_info');
            }
            if (Schema::hasColumn('users', 'vendor_join')) {
                $table->dropColumn('vendor_join');
            }
        });
    }
};
