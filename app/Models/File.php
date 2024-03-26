<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename',
        'fileid',
        'name',
    ];
    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }
}
