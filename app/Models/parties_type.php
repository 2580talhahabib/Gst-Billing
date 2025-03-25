<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parties_type extends Model
{
    use HasFactory;
    protected $table = 'parties_types';
    protected $guarded=[];
    public function parties(){
   return $this->hasOne(Party::class);
    }
    public function gstbills(){
        return $this->hasOne(GstBill::class);
    }
}
