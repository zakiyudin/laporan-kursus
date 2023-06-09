<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ReportMember;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'no_hp',
        'address',
        'status'
    ];

    public function report_members()
    {
        return $this->hasMany(ReportMember::class);
    }
}
