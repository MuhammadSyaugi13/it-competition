<?php

namespace Config;

use App\Controllers\Dashboard as ControllersDashboard;
use CodeIgniter\CodeIgniter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'authFilter' => \App\Filters\authFilter::class,
		// 'role'       => \Myth\Auth\Filters\RoleFilter::class,
		// 'permission' => \Myth\Auth\Filters\PermissionFilter::class

	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'authFilter' => ['except' => ['Auth/*']]
			// 'login',
			// 'dashboard'
			// 'csrf',
		],
		'after'  => [
			// 'toolbar',
			// 'authFilter' => ['except' => ['Auth', 'Auth/register', 'Planninng/*', 'Auth/*'],]
			// // 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'authFilter' => [
			'before' => ['Dashboard/*', 'Dashboard', 'Debit', 'Debit/*', 'Planning', 'Planning/*', '/'],
			// 'after' => ['Auth/index', 'auth']
		],
	];
}
