<?php namespace Xtwoend\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Xtwoend\Models\Eloquent\Jurusan;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Pendaftar extends Model 
{
    use SoftDeletingTrait;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pendaftars_online';

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
                                'nomor_ujian',
                                'nama',
                                'tanggal_lahir' ,
                                'asal_sekolah',
                                'asal_pendaftar',  
                                'nilai_mtk', 
                                'nilai_ipa', 
                                'nilai_ind', 
                                'nilai_ing',
                                'total_un', 
                                'pilihan_1', 
                                'pilihan_2',
                                'gelombang',
                                'ruang',
                                'bangku',
                                'daftarulang',
                                'biodata',
                                'spot',
                                'spcs',
                                'spttn',
                                'spd',
                                'user_id');

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->jurusan = new Jurusan;
    }

    public function user()
    {
        return $this->belongsTo('Cartalyst\Sentry\Users\Eloquent\User');
    }

    /**
     * Tanggal Lahir format
     * @return date format (d/m/Y)
     */
    public function getTanggalLahirAttribute()
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d',$this->attributes['tanggal_lahir'])->format('d/m/Y');
    }

    /**
     * Create_at format
     * @return date format (d/m/Y H:i)
     */
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$this->attributes['created_at'])->format('d/m/Y H:i');
    }

    public function getNilaiMtkAttribute()
    {   
        $zero = ($this->attributes['nilai_mtk'] < 10) ? '0' : '';
        return $zero . number_format($this->attributes['nilai_mtk'],2);
    }

    public function getNilaiIngAttribute()
    {   
        $zero = ($this->attributes['nilai_ing'] < 10) ? '0' : '';
        return $zero . number_format($this->attributes['nilai_ing'],2);
    }

    public function getNilaiIndAttribute()
    {   
        $zero = ($this->attributes['nilai_ind'] < 10) ? '0' : '';
        return $zero . number_format($this->attributes['nilai_ind'],2);
    }

    public function getNilaiIpaAttribute()
    {   
        $zero = ($this->attributes['nilai_ipa'] < 10) ? '0' : '';
        return $zero . number_format($this->attributes['nilai_ipa'],2);
    }
   
}
