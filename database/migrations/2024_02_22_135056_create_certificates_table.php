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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->dateTime('expiry_date');
            $table->string('certificate_type');
            $table->string('pci_owner');
            $table->string('certificate_name');
            $table->string('equipment');
            $table->string('provider');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('email_contact');
            $table->string('generated_by');
            $table->string('about_certificate');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
