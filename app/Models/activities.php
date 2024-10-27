<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Type;
use App\Models\Reward;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;

    // กำหนดค่าที่สามารถกรอกได้ในฐานข้อมูล
    protected $fillable = ['code', 'name', 'datetime', 'activity_by', 'location', 'score', 'description', 'type_id', 'student_id', 'reward_id'];

    /**
     * ความสัมพันธ์แบบ BelongsToMany กับโมเดล Student
     * หมายถึง กิจกรรมหนึ่งสามารถมีผู้เข้าร่วมได้หลายคนและผู้เข้าร่วม 1 คน เข้าร่วมได้หลายกิจกรรม
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    /**
     * ความสัมพันธ์แบบ BelongsTo กับโมเดล Type
     * หมายถึง กิจกรรมจะมีแค่ 1 ประเภท
     */
    public function types(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * ความสัมพันธ์แบบ BelongsTo กับโมเดล Reward
     * หมายถึง กิจกรรมจะมี 1 รางวัล
     */
    public function rewards(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }
}
