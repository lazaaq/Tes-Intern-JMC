<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model 
{
    use HasFactory;

    protected $guarded = ['id'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
    public function scopeSearch($query){
        if(request('search')){
            $query = $query->where('name', 'like', '%' . request('search') . '%');
        }
        if(request('provinsi_search')){
            $query = $query->where('provinsi_id', request('provinsi_search'));
        }
        return $query;
    }
}
