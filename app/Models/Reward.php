<?php

namespace App\Models;


use App\Models\activities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reward extends Model
{
    use HasFactory;

    // กำหนดค่าที่สามารถกรอกได้ในฐานข้อมูล
    protected $fillable = ['code', 'score', 'description'];

    /**
     * ความสัมพันธ์แบบ HasMany กับโมเดล Activity
     * หมายถึง หมวดหมู่หนึ่งสามารถมีผลิตภัณฑ์หลายรายการ
     */
    public function activities(): HasMany
    {
        return $this->hasMany(activities::class);
    }
}
