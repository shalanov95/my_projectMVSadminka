<?php
	use \Core\Route;
	
	return [
		new Route('/auth/', 'auth', 'auth'),
		new Route('/admin/', 'admin', 'manager'),
		new Route('/clinic/', 'clinic', 'manager'),
		new Route('/personal/', 'personal', 'manager'),
	];
	
