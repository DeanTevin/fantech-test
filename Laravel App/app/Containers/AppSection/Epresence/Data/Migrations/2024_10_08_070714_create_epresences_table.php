<?php

use App\Containers\AppSection\Epresence\Data\Enums\EpresenceTypeEnums;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {

    public function up(): void
    {
        Schema::create('epresences', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('id_users');
            $table->enum('type', array_map(fn($case) => $case->value, EpresenceTypeEnums::cases()));
            $table->boolean('is_approved');
            $table->timestamp('waktu');

            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('epresences');
    }
};
