<?php

namespace App\Rudraksha\Entities;

use Illuminate\Database\Eloquent\Model;

class Capping extends Model
{
    public $table = 'cappings';
    protected $fillable = [
        'type', 'design_image','price','metal_quantity_used', 'description','status'
    ];
}
