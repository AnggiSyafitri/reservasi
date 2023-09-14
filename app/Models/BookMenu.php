<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMenu extends Model
{
    use HasFactory;
    protected $guarded = [];

    function detail() {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

}
