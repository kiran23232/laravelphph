<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    protected $fillable = ['name','email','password'];

    protected $hidden =['password', 'remember_token'];
    use \Illuminate\Auth\Authenticatable;
    public function posts()
    {

        return $this->hasmany('App\Post');
    }


}
