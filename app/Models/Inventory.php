<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

//    protected $fillable = [];

    public function parameters(){

        return $this->belongsToMany(Parameter::class, 'inventory_parameter');
    }
}
