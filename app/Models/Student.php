<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'first_name', 'last_name', 'year', 'major', 'score', 'user_id'];

    /**
     * ความสัมพันธ์แบบ BelongsToMany กับโมเดล Activity
     * หมายถึง กิจกกรรมหนึ่งสามารถมีผู้เข้าร่วมได้หลายคนและผู้เข้าร่วม 1 คน เข้าร่วมได้หลายกิจกกรรม
     */
    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(activities::class)->withTimestamps();
    }
}
