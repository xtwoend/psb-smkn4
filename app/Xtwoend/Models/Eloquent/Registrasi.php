<?php namespace Xtwoend\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Xtwoend\Models\Eloquent\Jurusan;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Registrasi extends Model 
{
    use SoftDeletingTrait;

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pendaftars';

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
    protected $fillable = array('nomor_ujian',
                                'nomor_pendaftaran', 
								'nisn',
                                'nama',
                                'jenis_kelamin', 
                                'tempat_lahir',
                                'tanggal_lahir' ,
                                'sekolah_asal',
                                'status_sekolah',  
                                'nilai_mtk', 
                                'nilai_ipa', 
                                'nilai_ind', 
                                'nilai_ing',
                                'total_un', 
                                'alamat', 
                                'domisili',
                                'pilihan_1', 
                                'pilihan_2',
                                'pilihan_3',
                                'pilihan_4',
                                'nilai_pil_1',
                                'nilai_pil_2',
                                'nilai_pil_3',
                                'nilai_pil_4',
                                'terima_1',
                                'terima_2',
                                'terima_3',
                                'terima_di',
                                'nilai_benar',
                                'nilai_salah',
                                'nilai_kosong',
                                'daftarulang',
                                'biodata',
                                'spot',
                                'spcs',
                                'spttn',
                                'spd',
                                'foto',
                                'user_id',
                                'gelombang',
                                'ruang',
                                'bangku',
                                'tgl_daftar',
                                'keterangan',
                                'nilai_tes',
                                'total_nilai',
                                'skor_prestasi',
                                'skor_tidak_mampu',
                                'tahap_2'
                                );

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
    // public function getTanggalLahirAttribute()
    // {
    //     return \Carbon\Carbon::createFromFormat('Y-m-d',$this->attributes['tanggal_lahir'])->format('d/m/Y');
    // }

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

    public function getDomisiliToStringAttribute()
    {
        return $this->domisiliToString($this->attributes['domisili']);
    }

    public function domisiliToString($domisili)
    {
        switch ($domisili) {
            case 1:
                return 'RT';
                break;
            case 2:
                return 'RW';
                break;
            case 3:
                return 'KELURAHAN';
                break;
            case 4:
                return 'KECAMATAN';
                break;
            default:
                    return 'Domisili Tidak Dipilih';
                break;
        }
    }

    public function getPilihan1StringAttribute()
    {
        return ($jur = $this->jurusan->find($this->attributes['pilihan_1']))? $jur->jurusan: 'Tidak dipilih';
    }

    public function getPilihan2StringAttribute()
    {
        return ($jur = $this->jurusan->find($this->attributes['pilihan_2']))? $jur->jurusan: 'Tidak dipilih';
    }

    public function getPilihan3StringAttribute()
    {
        return ($jur = $this->jurusan->find($this->attributes['pilihan_3']))? $jur->jurusan: 'Tidak dipilih';
    }

    public function getPilihan4StringAttribute()
    {
        return ($jur = $this->jurusan->find($this->attributes['pilihan_4']))? $jur->jurusan: 'Tidak dipilih';
    }

    public function getStatusSekolahStringAttribute()
    {
        return ($this->attributes['status_sekolah'] ==1) ? 'DALAM KOTA' : 'LUAR KOTA';
    }
   
}
