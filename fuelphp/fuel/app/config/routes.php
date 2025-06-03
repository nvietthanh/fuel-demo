<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

$common = array(
	'_404_' => 'welcome/404',
);

$admin = array(
	// authenticate
	'admin/login' => 'admin/auth/login',
	'admin/logout' => 'admin/auth/logout',

	// manage
	'admin/products' => 'admin/products/index',
	'admin/products/create' => 'admin/products/create',
	'admin/products/store' => 'admin/products/store',
	'admin/products/delete/(:num)' => 'admin/products/delete/$1',
);

return array_merge($common, $admin);
