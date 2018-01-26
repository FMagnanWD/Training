<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categories;

class Media extends Model
{
    use Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'categories_id', 'user_id'
    ];

    /**
     * The attribute that stipulate date type columns
     * @var array
     */
    protected $date = [
        'uploaded_at'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'uploaded_at', 'from_id'
    ];

    public function user()
    {
        return $this->hasOne(\App\User::class, 'from_id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }
    

}
