<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function book(){
        return $this->hasMany(Book::class);
    }

    public function book_loan(){
        return $this->hasMany(BookLoans::class);
    }

    public function admin_notification(){
        return $this->hasMany(AdminNotification::class);
    }
}
