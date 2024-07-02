<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Task extends Model
{
    use HasFactory;
    public $incrementing = false;

    // Use 'string' instead of 'int' for the primary key type
    protected $keyType = 'string';

    // Automatically generate a UUID when creating a new Task
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Define the fillable attributes
    protected $fillable = [
        'title', 
        'description', 
        'status', 
        'start_date', 
        'duration', 
        'due_date'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
