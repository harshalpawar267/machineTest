<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\ProductDetail;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Model
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'product' ;
    public $timestamps = false;
    protected $fillable = [
        'id', 'product_name', 'create_at',
    ];

    public function ProductDetail(){
        
        return $this->hasMany('App\ProductDetail','p_id','id');
        
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    
}
