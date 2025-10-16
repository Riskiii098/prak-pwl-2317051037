<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id';
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
     * Relasi ke tabel Kelas
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    /**
     * Ambil semua user beserta nama kelasnya
     */
    public function getUser()
    {
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                    ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                    ->get();
    }
}
