<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $fillable = [
        'referral_code',
        'user_id',
        'parent_user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function childs() {

        return $this->hasMany(Network::class, 'parent_user_id','id') ;

    }

     // One level child
     public function child()
     {
         return $this->hasMany(Category::class, 'parent_id');
     }
 
     // Recursive children
     public function children()
     {
         return $this->hasMany(Category::class, 'parent_id')
             ->with('children');
     }
 
     // One level parent
     public function parent()
     {
         return $this->belongsTo(Category::class, 'parent_id');
     }
 
     // Recursive parents
     public function parents() {
         return $this->belongsTo(Category::class, 'parent_id')
             ->with('parent');
     }
 
     public function getPathAttribute()
     {
         $path = [];
         if ($this->parent_id) {
             $parent = $this->parent;
             $parent_path = $parent->path;
             $path = array_merge($path, $parent_path);
         }
         $path[] = $this->name;
         return $path;
     }
 
}
