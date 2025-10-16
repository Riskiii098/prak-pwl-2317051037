<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * 🔹 Generate UUID otomatis saat membuat record baru
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
     * 📚 Ambil semua data mata kuliah
     */
    public function getAllMK()
    {
        return $this->all();
    }
}
