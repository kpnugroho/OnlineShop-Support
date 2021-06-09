<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblEkspedisi extends Model
{
    protected $table = 'tblEkspedisi';
    protected $primaryKey = 'id_ekspedisi';
    public $timestamps = false;
    
    protected $fillable = ['id_ekspedisi', 'kode_ekspedisi', 'nama_ekspedisi', 'is_active', 'create_by', 'create_on', 'update_by', 'update_on'];
}
