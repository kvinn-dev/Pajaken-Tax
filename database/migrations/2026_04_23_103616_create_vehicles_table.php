<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nik_id')->constrained('niks')->onDelete('cascade');
            $table->string('no_polisi')->unique();
            $table->string('no_mesin');
            $table->string('no_rangka');
            $table->string('warna');
            $table->enum('jenis', ['motor', 'mobil']);
            $table->string('bahan_bakar');
            $table->date('tanggal_pajak');
            $table->timestamps();
        });
    }
};

