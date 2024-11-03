<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    // Other model methods and properties
    use HasFactory;
    public function toggleStatus()
    {
        $this->status = !$this->status;
        $this->save();
    }
    protected $table ='products';
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'price',
    ];
}
