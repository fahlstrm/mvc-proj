<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Authenticatable
{
    use HasFactory, Notifiable;

    public $table = "blog";

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'blog_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog',
        'title',
        'post',
        'created_at',
        'updated_at'
    ];
}
