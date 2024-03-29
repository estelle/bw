<?php

$container['bwp'] = function( $container ) {
	return HM\BackUpWordPress\Plugin::get_instance();
};

$container['addon'] = function( $container ) {
	return new $container['addon_class']( $container['addon_version'], $container['min_bwp_version'], $container['service_class'],$container['edd_download_file_name'] );
};

$container['updater'] = function( $container ) {
	return new $container['updater_class']();
};

$container['admin'] = function( $container ) {
	return new $container['checklicense_class']( $container['addon_settings'], $container['edd_download_file_name'], $container['addon'], $container['updater'], $container['prefix'] );
};
