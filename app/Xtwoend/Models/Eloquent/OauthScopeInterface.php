<?php namespace Xtwoend\Models\Eloquent;


interface OauthScopeInterface
{

    /**
     * Returns the OAuth scope's table name.
     *
     * @return string
     */
    public function getTable();

    /**
     * Returns the OAuth scope's ID.
     *
     * @return mixed
     */
    public function getId();

    /**
     * Saves the OAuth scope.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = array());

    /**
     * Delete the OAuth scope.
     *
     * @return bool
     */
    public function delete();

}
