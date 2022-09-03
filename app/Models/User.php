<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

//protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function uploadAvatar($image){
        $filename = $image->getClientOriginalName();
        auth()->user()->deleteOldImage();
        $image->storeAs('images', $filename, 'public');
        auth()->user()->update(['avatar' => $filename]);
    }

    protected function deleteOldImage(){
        if($this->avatar){
            Storage::delete('public/images/'.auth()->user()->avatar);
        }
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
