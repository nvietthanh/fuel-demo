<?php

namespace Fuel\Tasks;

use Seeds_Products;
use Seeds_Categories;
use Seeds_Users;

class Seed
{

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r seed
	 *
	 * @return string
	 */
	public function run()
	{
        Seeds_Users::run();
        Seeds_Categories::run();
        Seeds_Products::run();
	}
}
/* End of file tasks/seed.php */
