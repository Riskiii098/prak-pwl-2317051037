<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $guarded = ['id'];

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Generate UUID otomatis saat create
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Relasi ke UserModel (satu kelas punya banyak user)
     */
    public function user()
    {
        return $this->hasMany(UserModel::class, 'kelas_id');
    }

    /**
     * Ambil semua data kelas
     */
    public function getKelas()
    {
        return $this->all();
    }
}
