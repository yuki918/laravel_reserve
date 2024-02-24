<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'information',
        'start_date',
        'end_date',
        'max_people',
        'is_visible',
    ];

    // イベント日付
    protected function eventDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($this->start_date)->format('Y年m月d日')
        );
    }
    protected function editEventDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($this->start_date)->format('Y-m-d')
        );
    }
    // イベント開始時間
    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($this->start_date)->format('H時i分')
        );
    }
    // イベント終了時間
    protected function endTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($this->end_date)->format('H時i分')
        );
    }

}
