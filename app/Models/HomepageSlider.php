<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSlider extends Model
{
    use HasFactory;

    protected $table = 'homepage_slider';

    protected $fillable = [
        'path',
        'order',
    ];

    public static function reorder()
    {
        $images = self::all(); // pega todas ordenadas

        foreach ($images as $index => $image) {
            $image->update(['order' => $index + 1]); // começa em 1 ao invés de 0
        }
    }

}
