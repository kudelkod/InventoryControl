<?php

namespace App\Modules\Inventory\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'inventory_images';

    protected $keyType = 'integer';

    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'path',
        'inventory_id'
    ];

    protected $appends = [

    ];

    public function inventory(){
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }
}
