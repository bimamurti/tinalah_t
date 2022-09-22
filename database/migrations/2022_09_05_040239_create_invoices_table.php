<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('noinvoice');
            $table->string('namacust');
            $table->string('orgcust');
            $table->string('hpcust');
            $table->string('emailcust');
            $table->foreignid(User::class);
            $table->string('jenispaket');
            $table->dateTime('waktu_ambil',$precision=0);
            $table->datetime('waktu_selesai',$precision=0);
            $table->string('hargafinal');
            $table->string('jumlahpembayaran');
            $table->string('buktibayar');
            $table->text('keteranganinvoice');
            $table->text('keteranganpembayaran');
            $table->datetime('waktu_pembayaran',$precision=0);
            $table->datetime('waktu_konfirm',$precision=0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
