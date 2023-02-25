<?php

namespace App\Infrastructure\Writer\DTOs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * ライターDTOクラス
 */
final class WriterDTO extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "writer";

    /**
     * @var array
     */
    protected $cast = [
        'id' => 'integer',
    ];

    /**
     * DateTimeクラスに変換されるカラム
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
