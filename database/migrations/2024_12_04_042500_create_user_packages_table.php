<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackagesTable extends Migration
{
    public function up()
    {
        Schema::create('user_packages', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_id');

            // Status of the package
            $table->enum('status', ['active', 'expired', 'pending'])->default('pending');

            // Start and expiration dates
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_packages');
    }
}
