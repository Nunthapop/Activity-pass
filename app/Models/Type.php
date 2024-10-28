<?php

namespace App\Models;

<<<<<<< Updated upstream
use App\Models\activities;
=======

use App\Models\activities;   
>>>>>>> Stashed changes
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    // กำหนดค่าที่สามารถกรอกได้ในฐานข้อมูล
    protected $fillable = [ 'id','code','datetime', 'name', 'description'];

    /**
     * ความสัมพันธ์แบบ HasMany กับโมเดล Activity
     * หมายถึง หมวดหมู่หนึ่งสามารถมีผลิตภัณฑ์หลายรายการ
     */
    public function activities(): HasMany
    {
        return $this->hasMany(activities::class);
    }
}
