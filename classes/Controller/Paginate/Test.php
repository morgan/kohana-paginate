<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Paginate Test resource
 *
 * @package		Paginate
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011-2012 Micheal Morgan
 * @license		MIT
 */
class Controller_Paginate_Test extends REST_Controller 
{
	/**
	 * Enforce CLI
	 * 
	 * @access	public
	 * @return	void
	 */
	public function before()
	{
		if ( ! Kohana::$is_cli)
			throw new Kohana_Exception('Must be running in CLI.');
	}
	
	/**
	 * GET test
	 * 
	 * @access	public
	 * @return	void
	 */
	public function action_get()
	{
		$database = DB::select()->from('paginate_test');
		
		$paginate = Paginate::factory($database)
			->columns(array('id', 'label'));
		
		$collection = REST_Collection::factory($paginate)->execute();
		
		foreach ($collection->paginate()->result() as $row)
		{
			$collection->add_row(array
			(
				'id'	=> $row['id'],
				'label'	=> $row['label']
			));
		}		

		$this->render($collection->render());
	}	
}
