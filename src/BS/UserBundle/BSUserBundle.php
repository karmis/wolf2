<?php

namespace BS\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BSUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
