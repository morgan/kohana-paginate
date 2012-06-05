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
class Kohana_Paginate_DispatchTest extends Kohana_Paginate_DatabaseTest
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
			'url'		=> URL::site(),
			'extension'	=> 'json'
		));
		
		$dispatch = Dispatch::factory('paginate/test', $connection);
			
		return Paginate::factory($dispatch);
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
			$this->markTestSkipped('Paginate Dispatch test requires Dispatch module.');
        }
        
        if ( ! class_exists('REST_Collection'))
        {
        	$this->markTestSkipped('Paginate Dispatch test requires REST module.');
        }
    }
}