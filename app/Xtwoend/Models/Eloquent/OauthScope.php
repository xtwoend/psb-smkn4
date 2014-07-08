<?php namespace Xtwoend\Models\Eloquent;
 
use Illuminate\Database\Eloquent\Model;

class OauthScope extends Model implements OauthScopeInterface
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'oauth_scopes';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = array('scope','name','description');

	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = array();

    /**
     * Returns the OAuth scope's table name.
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Returns the OAuth scope's ID.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getKey();
    }

    /**
     * Saves the OAuth scope.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = array())
    {
        return parent::save();
    }

    /**
     * Delete the OAuth scope.
     *
     * @return bool
     */
    public function delete()
    {
        return parent::delete();
    }

}