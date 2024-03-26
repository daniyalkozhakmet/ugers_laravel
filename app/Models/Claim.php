<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'neighborhood',
        'invent_num',
        'address',
        'direction',
        'date_of_excavation',
        'open_square',
        'date_recovery_ABP',
        'square_restored_area',
        'street_type',
        'type_of_work',
        'is_deleted',
        'is_done',
        'deleted_at',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'claim_photo',
        'date_of_sign',
        'date_of_sending',
        'date_of_fixing',
        "user_id",
        'res'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image1()
    {
        return $this->hasOne(File::class);
    }
    public function image2()
    {
        return $this->hasOne(File::class);
    }
    public function image3()
    {
        return $this->hasOne(File::class);
    }
    public function image4()
    {
        return $this->hasOne(File::class);
    }
    public function image5()
    {
        return $this->hasOne(File::class);
    }
    public function image6()
    {
        return $this->hasOne(File::class);
    }
    public function claim_photo()
    {
        return $this->hasOne(File::class);
    }
}
