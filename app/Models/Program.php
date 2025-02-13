<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it's plural of the model name)
    protected $table = 'programs';

    // Define the fillable fields (these are the fields that can be mass-assigned)
    protected $fillable = [
        'title',
        'description',
        'country',
        'duration',
        'requirements',
        'image',
        'start_date',
        'end_date',
        'deadline',
        'cost',
        'partner_id',
        'slug',
        'status'
    ];
    // In Program model
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'deadline' => 'datetime',
    ];


    // Define the relationship with the Partner model
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public static function getProgramBySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail(); // Return the program or fail if not found
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (empty($program->slug)) {
                $slug = Str::slug($program->title);
                $existingProgram = Program::where('slug', $slug)->first();
                $counter = 1;

                while ($existingProgram) {
                    $slug = Str::slug($program->title) . '-' . $counter;
                    $existingProgram = Program::where('slug', $slug)->first();
                    $counter++;
                }

                $program->slug = $slug;
            }
        });
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

}
