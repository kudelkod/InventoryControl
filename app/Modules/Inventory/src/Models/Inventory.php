<?php

namespace App\Modules\Inventory\src\Models;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

//    protected $fillable = [];

}
