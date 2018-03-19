<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'owner_id',
        'product_name',
        'share_holder_id',
        'share_status',
        'product_returned',
    ];

    public function owner()
    {
        return $this->hasOne('App\User', 'id', 'owner_id' );
    }

    public function share_holder()
    {
        return $this->hasOne('App\User', 'id', 'share_holder_id' );
    }

}
