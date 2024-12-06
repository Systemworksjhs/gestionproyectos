<?php

	spl_autoload_register(function ($modelname) {
		include Model::getFullPath($modelname);
	});

?>