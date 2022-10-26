<?php

namespace Soft2do\Draggable;
class DatabaseRecordList extends \TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList {

	public function __construct() {
		parent::__construct();
		$renderer =\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
		$renderer->addJsFile('/typo3conf/ext/moduleview_draggable/Resources/Public/JavaScript/RecordListDrag.js', 'text/javascript', false, false, '', true, '|', false, '');
	}
}

