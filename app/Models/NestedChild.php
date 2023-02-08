<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NestedChild extends Model
{
    use HasFactory;

    public const STUDY_RADIO = [
        '0' => 'না',
        '1' => 'হ্যা',
    ];

    public $table = 'nested_children';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'children_id',
        'name',
        'age',
        'study',
        'study_stage',
        'study_place',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function children()
    {
        return $this->belongsTo(Child::class, 'children_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
