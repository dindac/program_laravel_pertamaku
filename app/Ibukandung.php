<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibukandung extends Model
{
    protected $table = 'ibukandung';
    protected $primaryKey = 'id_biodata';
    protected $fillable = ['id_biodata', 'nama_kandung'];

    public function mahasiswa(){
        return $this->belongsTo('App\Biodata', 'id_biodata');
    }
}
