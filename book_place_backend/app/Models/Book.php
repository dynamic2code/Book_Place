<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function book_loan()
    {
        return $this->belongsTo(BookLoans::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
