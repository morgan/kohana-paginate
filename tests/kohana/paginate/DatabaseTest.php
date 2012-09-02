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
class Kohana_Paginate_DatabaseTest extends Kohana_PaginateTest
{
	/**
	 * Database
	 * 
	 * @access	protected
	 * @var		mixed	NULL|Database
	 */
	protected $_database;
	
	/**
	 * Table name
	 * 
	 * @access	protected
	 * @var		mixed	NULL|string
	 */
	protected $_table_name = 'paginate_test';
	
	/**
	 * Factory
	 * 
	 * @covers	Paginate::search_columns
	 * @access	public
	 * @return	Paginate
	 */
	public function factory()
	{
		return Paginate::factory(DB::select('id', 'label')->from($this->_table_name))
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
        if (class_exists('Database'))
        {
			$this->_database = Database::instance();
			
			$this->_setup_table();
			
			$this->_fill_table();
        }
        else
        {
        	$this->markTestSkipped('Database module not loaded.');
        }
        
        parent::setUp();
    }

	/**
	 * Cleanup
	 * 
	 * @access	public
	 * @return	void
	 */
	public function tearDown()
	{
		parent::tearDown();
		
		$this->_drop_table();
	}    
    
    /**
     * Create table if does not exist
     * 
     * @access	protected
     * @return	void
     */
    protected function _setup_table()
    {
        if ($this->_database->list_tables($this->_table_name))
    	{
	    	$this->_drop_table();
    	}  	
    	
    	$create_table = "CREATE TABLE `$this->_table_name` (
				`id` INT( 10 ) UNSIGNED NOT NULL PRIMARY KEY ,
				`label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";   		
    	
    	$this->_database->query(Database::INSERT, $create_table);
    }   

    /**
     * Drop table
     * 
     * @access	protected
     * @return	void
     */
    protected function _drop_table()
    {
    	$this->_database->query(Database::DELETE, "DROP TABLE `$this->_table_name`");
    }
    
    /**
     * Fill table
     * 
     * @access	protected
     * @return	void
     */
    protected function _fill_table()
    {
    	for ($i = 1; $i <= 15; $i++)
    	{
    		DB::insert($this->_table_name, array('id', 'label'))
    			->values(array($i, 'label ' . $i))
    			->execute($this->_database);
    	}
    }
}
