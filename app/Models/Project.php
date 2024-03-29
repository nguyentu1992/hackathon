<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'manager_id',
        'start_date',
        'end_date',
    ];
    
    public function manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsToMany(User::class, 'project_member');
    }
    
}
