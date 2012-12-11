<?php defined('SYSPATH') OR die('Kohana bootstrap needs to be included before tests run');
/**
 * Tests Paginate ORM-REST driver
 *
 * @group		paginate
 * @package		Paginate
 * @category	Tests
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011-2012 Micheal Morgan
 * @license		MIT
 */
class Kohana_Paginate_ORM_RESTTest extends Kohana_Paginate_DatabaseTest
{
	/**
	 * Factory
	 * 
	 * @access	public
	 * @return	Paginate
	 */
	public function factory()
	{
		$connection = Dispatch_Connection::factory(array
		(
			'attempt_local'	=> TRUE,
			'extension'		=> 'json'
		));

		$orm = ORM_REST::factory('Paginate_ORM_REST')
			->connection($connection);

		return Paginate::factory($orm);
	}
	
	/**
	 * Check whether or not to skip test
	 * 
	 * @access	protected
	 * @return	void
	 */
	public function setUp()
	{
		parent::setUp();

		if ( ! class_exists('Dispatch'))
		{
			$this->markTestSkipped('Paginate ORM-REST driver test requires Dispatch module.');
		}
		
		if ( ! class_exists('ORM_REST'))
		{
			$this->markTestSkipped('Paginate ORM-REST driver test requires ORM-REST module.');
		}
	}
}
