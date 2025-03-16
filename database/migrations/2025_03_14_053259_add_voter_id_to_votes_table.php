<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('votes', function (Blueprint $table) {
            $table->string('voter_id')->unique()->after('id'); // Add voter_id column
        });
    }

    public function down() {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropColumn('voter_id'); // Remove voter_id if rolling back
        });
    }
};

