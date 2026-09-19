<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // วันที่แก้ "เนื้อหา" จริง (ต่างจาก updated_at ที่เปลี่ยนทุกครั้งที่ save)
            $table->timestamp('content_updated_at')->nullable()->after('published_at');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('content_updated_at');
        });
    }
};
