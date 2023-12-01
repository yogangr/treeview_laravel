<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content1',
        'content2',
        'description',
        'menu_id',
        'parent_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Item', 'parent_id', 'id');
    }
}
