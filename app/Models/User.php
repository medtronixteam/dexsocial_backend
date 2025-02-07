<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function studentReports(){
        return $this->hasMany(StudentReport::class, "id_user");
    }


    public function studentClass(){
        return $this->hasMany(StudentClass::class, "id_student");
    }

    // Tutor
    public function classGroup(){
        return $this->hasMany(ClassGroup::class, "id_tutor");
    }
      public function ReportStatus(){
        return $this->hasMany(ReportStatus::class, "id_student_group");
    }

    public function studentClassGroup() {
        return $this->hasMany(StudentClassGroup::class, "id_student");
    }

    public function studentGoals(){
        return $this->hasMany(StudentGoal::class, "id_student");
    }

    public function absenTutor(){
        return $this->hasMany(AbsenTutor::class, "id_tutor");
    }
/*---------------*/
    public function courses(){
        return $this->hasMany(Course::class, "branch_id");
    }

    // ClassAttendance
    public function attendances()
    {
        return $this->hasMany(ClassAttendance::class);
    }
    public function classgroupAdmin() {
        return $this->hasMany(ClassGroup::class, "branch_id","id");
    }
    public function types() {
        return $this->hasMany(ClassType::class, "branch_id","id");
    }
    public function levels() {
        return $this->hasMany(ClassLevel::class, "branch_id","id");
    }
     public function categories() {
        return $this->hasMany(ClassCategory::class, "branch_id","id");
    }


}
