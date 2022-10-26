<?php

// Hide translation for all tables when localization view is disabled
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('mod.web_list.hideTranslations = *');

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList::class] = [
    'className' => \Soft2do\Draggable\DatabaseRecordList::class,
];
// Hook for recordList
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['actions']['moduleview_draggable'] = 'Soft2do\\Draggable\\Hook\\ModuleRecordListHook';
