<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTag extends Model
{
    use HasFactory;

    protected $table = 'employee_tags';
    protected $fillable = ['employee_id', 'tag_id'];

    public function employee() {
        return $this->belongsToMany(Employee::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }
}
