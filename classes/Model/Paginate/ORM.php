<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Paginate Test ORM Model
 * 
 * @package		Paginate
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011-2012 Micheal Morgan
 * @license		MIT
 */
class Model_Paginate_ORM extends ORM
{
	/**
	 * Table name
	 *
	 * @access	protected
	 * @var		string
	 */
	protected $_table_name = 'paginate_test';
	
	/**
	 * Names not plural by default
	 * 
	 * @access	protected
	 * @var		bool
	 */
	protected $_table_names_plural = FALSE;
}
