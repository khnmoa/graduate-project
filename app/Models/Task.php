<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mission',
        'title',
        'description',
        'status',
        // --- الكولومز الجديدة اللي ضفناها ---
        'user_logged_in_at', // تاريخ ووقت دخول اليوزر
        'user_logged_out_at', // تاريخ ووقت خروج اليوزر
        'actions_taken',      // الإجراءات اللي عملها (JSON)
        'user_command_id',    // الـForeign Key لجدول user_commands
    ];

    // عشان لارافيل يتعرف على الـJSON column ويحوله لأري أو ديكشنري تلقائي
    protected $casts = [
        'actions_taken' => 'array',
        'user_logged_in_at' => 'datetime', // عشان يتعامل معاها كـ Carbon instance
        'user_logged_out_at' => 'datetime', // عشان يتعامل معاها كـ Carbon instance
    ];

    /**
     * العلاقة مع المستخدم الذي يمتلك هذه المهمة.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * العلاقة مع الـUserCommand الذي ارتبطت به هذه المهمة.
     * (لو كل مهمة مرتبطة بـ UserCommand واحد)
     */
    public function userCommand()
    {
        return $this->belongsTo(UserCommand::class, 'user_command_id');
    }

    // الـMethod دي (tasks) جوه موديل Task مش منطقية.
    // لأن الـTask مش بيكون ليه tasks جواه.
    // غالباً دي كان قصدك بيها في موديل الـUser لو User كان ليه tasks.
    // لو عايز Task يكون ليه علاقة مع Tasks تانية، يبقى نوع العلاقة مختلف (مثل hasMany)
    // لكن الاسم هنا (tasks) هو نفس اسم الموديل، فممكن يعمل لخبطة.
    // لو كانت فعلاً غلطة وكان قصدك حاجة تانية ممكن توضحها.
    // حالياً هشيلها من هنا عشان ميحصلش تعارض أو سوء فهم.
    // public function tasks()
    // {
    //     return $this->hasMany(Task::class, 'user_id');
    // }
}