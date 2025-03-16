<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('voter_ids', function (Blueprint $table) {
            $table->id();
            $table->string('voter_id', 17)->unique(); // Ensuring uniqueness of voter IDs
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voter_ids');
    }
};

