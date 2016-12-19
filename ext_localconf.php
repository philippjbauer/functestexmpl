<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'PhilippBauer.' . $_EXTKEY,
	'Pi1',
	array(
		'Device' => 'list, show, new, create, edit, update, disable',
		
	),
	// non-cacheable actions
	array(
		'Device' => 'create, update, ',
		
	)
);
