<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Paginate
 * 
 * @package		Paginate
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011-2012 Micheal Morgan
 * @license		MIT
 */
class Model_Paginate_Test extends ORM
{
	/**
	 * Check if structure exists and if not, create it
	 * 
	 * @static
	 * @access	public
	 * @return	bool
	 */
	public static function structure()
	{
		var_dump(Database::instance()->list_tables('paginate_test'));exit;
	}
}