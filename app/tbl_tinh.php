<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_tinh extends Model
{
    protected $table= "tbl_tinh";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_nhanvien');
    }
}
