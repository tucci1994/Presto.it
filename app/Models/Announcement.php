<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable=[
        'product',
        'price',
        'brand',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function ToBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function toSearchableArray()
    {

        $category = $this->category;

        $array = [
           'id'=>$this->id,
           'product'=>$this->product,
           'price'=>$this->price,
           'brand'=>$this->brand,
           'category'=>$category,
           'description'=>$description,
        ];
        return $array;
    }

    public function images(){
        return $this->hasMany(AnnouncementImage::class);
    }
}
