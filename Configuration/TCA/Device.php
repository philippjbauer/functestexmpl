<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_functestexmpl_domain_model_device'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_functestexmpl_domain_model_device']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, device_id, interventions, operating_times, location, software, hardware, licenses, company, configuration',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, device_id, interventions, operating_times, location, software, hardware, licenses, company, configuration, '),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_functestexmpl_domain_model_device',
				'foreign_table_where' => 'AND tx_functestexmpl_domain_model_device.pid=###CURRENT_PID### AND tx_functestexmpl_domain_model_device.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),

		'device_id' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.device_id',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'interventions' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.interventions',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_functestexmpl_domain_model_intervention',
				'foreign_field' => 'device',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'operating_times' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.operating_times',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_functestexmpl_domain_model_operatingtime',
				'foreign_field' => 'device',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'location' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.location',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_functestexmpl_domain_model_location',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'software' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.software',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_functestexmpl_domain_model_software',
				'foreign_field' => 'device',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'hardware' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.hardware',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_functestexmpl_domain_model_hardware',
				'foreign_field' => 'device',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'licenses' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.licenses',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_functestexmpl_domain_model_license',
				'foreign_field' => 'device',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'company' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.company',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_functestexmpl_domain_model_company',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'configuration' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.configuration',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_functestexmpl_domain_model_configuration',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
$GLOBALS['TCA']['tx_functestexmpl_domain_model_device']['types']['1'] = [
	'showitem' => '--div--;LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.configuration, device_id, company, configuration, location, --div--;LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.interventions, interventions, --div--;LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.operating_times, operating_times, --div--;LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.software, software, --div--;LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.hardware,, hardware, --div--;LLL:EXT:functestexmpl/Resources/Private/Language/locallang_db.xlf:tx_functestexmpl_domain_model_device.licenses, licenses, --div--;Access, sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, '
];