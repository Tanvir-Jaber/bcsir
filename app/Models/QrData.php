<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class QrData extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $table = "qr_data";
    
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
