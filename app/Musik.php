<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musik extends Model
{
    protected $table = "tb_alatmusik";

    protected $primaryKey = 'id_alat';

    protected $fillable = ['no_alat', 'nama_alat', 'merk_alat', 'jenis', 'harga'];
}
