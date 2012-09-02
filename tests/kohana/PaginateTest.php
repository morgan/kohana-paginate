<?php defined('SYSPATH') OR die('Kohana bootstrap needs to be included before tests run');
/**
 * Tests Paginate
 *
 * @group		paginate
 * @package		Paginate
 * @category	Tests
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011-2012 Micheal Morgan
 * @license		MIT
 */
abstract class Kohana_PaginateTest extends Unittest_TestCase
{
	/**
	 * Total count
	 * 
	 * @access	protected
	 * @var		int
	 */
	protected $_count_total = 15;	
	
	/**
	 * Factory pattern
	 * 
	 * @access	public
	 * @return	Paginate
	 */
	abstract public function factory();

    /**
     * Test limit
     * 
     * @covers	Paginate::limit
     * @covers	Paginate::count
     * @covers	Paginate::count_total
     * @covers	Paginate::execute
     * @access	public
     * @return	void
     */
    public function test_limit()
    {
    	$paginate = $this->factory();
    	
    	$paginate
    		->limit(0, 5)
    		->execute();

    	// Test total count
    	$this->assertEquals($this->_count_total, $paginate->count_total());
    	
    	// Test count
    	$this->assertEquals(5, $paginate->count());    	
    }

    /**
     * Test limit
     * 
     * @covers	Paginate::search
     * @covers	Paginate::count
     * @covers	Paginate::count_total
     * @covers	Paginate::execute
     * @access	public
     * @return	void
     */
    public function test_search()
    {
    	$paginate = $this->factory();
    	
    	$paginate
			->search('label 5')
    		->execute();

    	// Test total count
    	$this->assertEquals($this->_count_total, $paginate->count_total());
    	
    	// Test count
    	$this->assertEquals(1, $paginate->count());    	
    } 
}