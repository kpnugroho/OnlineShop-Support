<?php

namespace App\Models;

use Illuminate\Foundation\Auth\tblUser as Authenticatable;

class tblUser extends Authenticatable
{
    protected $table = 'tblUser';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    
    protected $fillable = ['user_id', 'nama_depan', 'nama_belakang', 'no_telp', 'no_wa', 'email', 'password', 'is_trial', 'is_member', 'create_on', 'update_On'];
}
