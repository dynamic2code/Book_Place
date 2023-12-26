<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Book extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'publisher',
        'isbn',
        'category',
        'sub_category',
        'description',
        'pages',
        'image',
        'added_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function bookLoan()
    {
        return $this->belongsTo(BookLoans::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
