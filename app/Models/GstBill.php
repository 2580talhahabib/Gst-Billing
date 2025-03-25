<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GstBill extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function parties_type(){
        return  $this->belongsTo(parties_type::class);
    }
}
