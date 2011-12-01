# Specifying a Driver

A driver can be set within factory (example using ORM):

	$user = ORM::factory('user');

	$paginate = Paginate::factory($user);

# Configuration

## Specify columns

	$user = ORM::factory('user');

	$paginate = Paginate::factory($user)
		->columns(array('id', 'title', 'created'))
		->search_columns(array('id', 'title'));
		
Note that `Paginate::search_columns` is only used for `Database` and `ORM`.

# Operations

## Limiting and Paging

	$length = 10;
	$start = 0;

	$paginate->limit($start, $length);
	
## Sort

	$paginate->sort('id', Paginate::SORT_ASC);
	
	$paginate->sort('title', Paginate::SORT_DESC);
	
## Search

	$paginate->search('search terms');
	
## Execute

	// Generate a result
	$paginate->execute();
	
	
## Result from Driver

	echo debug::vars($paginate->result());
	
## Counts

After executing Paginate, access to count and total count becomes available.
	
	$count = $paginate->count();
	
	$count_total = $paginate->count_total();	