<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Member;

class ReportMember extends Model
{
    use HasFactory;

    protected $table = 'report_members';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date_course',
        'book',
        'contact',
        'attendance',
        'evidence',
        'member_id'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
