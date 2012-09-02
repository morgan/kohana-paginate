<?php defined('SYSPATH') OR die('Kohana bootstrap needs to be included before tests run');
/**
 * Tests Paginate Database driver
 *
 * @group		paginate
 * @package		Paginate
 * @category	Tests
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011-2012 Micheal Morgan
 * @license		MIT
 */
class Kohana_Paginate_ORMTest extends Kohana_Paginate_DatabaseTest
{
	/**
	 * Factory
	 * 
	 * @covers	Paginate::search_columns
	 * @access	public
	 * @return	Paginate
	 */
	public function factory()
	{
		$orm = ORM::factory('paginate_test');
			
		return Paginate::factory($orm)
			->search_columns(array('label'));
	}
	
	/**
	 * Check whether or not to skip test
	 * 
	 * @access	protected
	 * @return	void
	 */
	public function setUp()
    {
        if ( ! class_exists('ORM'))
        {
			$this->markTestSkipped('ORM module not loaded.');
        }
        
        parent::setUp();
    }
}
