<?php namespace Xtwoend\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class OauthClientEndpoint extends Model implements OauthClientEndpointInterface
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'oauth_client_endpoints';

	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = array();

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = array('client_id','redirect_uri');

    /**
     * Returns the OAuth client endpoint's table name.
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Returns the OAuth client endpoint's ID.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getKey();
    }

    /**
     * Saves the OAuth client endpoint.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = array())
    {
        return parent::save();
    }

    /**
     * Delete the OAuth client endpoint.
     *
     * @return bool
     */
    public function delete()
    {
        return parent::delete();
    }

}