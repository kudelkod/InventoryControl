<?php

namespace App\Modules\Manufacture\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;

    protected $table = 'manufacturers';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

    protected $fillable =
        [
        'name',
        'slug',
        'description',
        'address'
        ];
}
