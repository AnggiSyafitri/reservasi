<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInformation extends Model
{
    use HasFactory;
    protected $guarded = [];

    function menus() {
        return $this->hasMany(BookMenu::class, 'book_information_id');
    }

    function sittingArea() {
        return $this->hasOne(SittingArea::class, 'id', 'sitting_area');
    }

}
