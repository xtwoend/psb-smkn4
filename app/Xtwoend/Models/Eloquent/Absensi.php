<?php namespace Xtwoend\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Absensi extends Model 
{
    use SoftDeletingTrait;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'absensis';

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
    protected $fillable = array('nip','nama','time','state','exception');

}
