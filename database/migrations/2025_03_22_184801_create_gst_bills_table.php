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
        Schema::create('gst_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parties_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('invoice_date');
            $table->string('invoice_no');
            $table->text('item_desc');
            $table->string('total_amount');
            $table->string('cgst_rate');
            $table->string('sgst_rate');
            $table->string('igst_rate');
            $table->string('cgst_amount');
            $table->string('sgst_amount');
            $table->string('igst_amount');
            $table->string('tax_amount');
            $table->string('net_amount');
            $table->text('declaration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gst_bills');
    }
};
