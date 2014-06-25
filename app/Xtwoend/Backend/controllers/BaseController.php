<?php namespace Xtwoend\Backend\Controllers;

/**
 * Backend App
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Backend
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

use Teepluss\Theme\Facades\Theme;

class BaseController extends \Illuminate\Routing\Controller
{	
	/**
     * Theme instance.
     *
     * @var \Teepluss\Theme\Theme
     */
    protected $theme;

    /**
     * Construct
     *
     * @return void
     */
	public function __construct()
	{
		// Using theme as a global.
        $this->theme = Theme::uses('admin')->layout('default');
	}
}