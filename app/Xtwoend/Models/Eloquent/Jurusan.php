<?php namespace Xtwoend\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Jurusan extends Model 
{
    use SoftDeletingTrait;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jurusans';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = array();

    /**
     * The attributes delete.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = array('jurusan');

}
