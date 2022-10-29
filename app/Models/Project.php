<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['project_type_id','name','image','location','other_detail','compl_year'];

    public function projectType(){
        return $this->belongsTo(ProjectType::class);
    }
}
