<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'title',
        'price',  
        'tags',
        'item_type',
        'text_content',
        'is_featured',
        'is_active',
        'created_by',
        'category_id'
    ];

    protected $casts = [
        'price' => 'decimal:2', // Asegura que el precio se almacene con dos decimales
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'tags' => 'array', // Si decides almacenar las etiquetas como un array JSON
    ];


    public function category()
    {

        return $this->belongsTo(Category::class, 'category_id');


    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
