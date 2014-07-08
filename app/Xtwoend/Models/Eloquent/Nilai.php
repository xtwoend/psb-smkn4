<?php namespace Xtwoend\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Nilai extends Model 
{
    use SoftDeletingTrait;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nilai_tests';

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



    protected $jurusan;


    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = array('nomor_pendaftaran', 
                                'nama',
                                'benar',
                                'user_id');

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

    public function user()
    {
        return $this->belongsTo('Cartalyst\Sentry\Users\Eloquent\User');
    }
   
}
