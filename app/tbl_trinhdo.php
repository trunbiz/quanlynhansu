<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_trinhdo extends Model
{
    protected $table= "tbl_trinhdo";
    protected $primaryKey= 'id_trinhdo';
    public $incrementing = false;
    
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_nhanvien');
    }
}
