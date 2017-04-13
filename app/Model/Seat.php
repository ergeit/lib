<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Seat extends Model
{
    //
    use SoftDeletes;
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'seats';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
