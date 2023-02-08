<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    public $table = 'children';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'house_id',
        'children_name',
        'profession',
        'mobile_no',
        'spouse_name',
        'spouse_mobile_no',
        'spouse_profession',
        'blood_group',
        'children_number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
