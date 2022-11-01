<?php

namespace Soft2do\Draggable\Hook;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use \TYPO3\CMS\Recordlist\RecordList\RecordListHookInterface;
use \TYPO3\CMS\Core\SingletonInterface;
use \TYPO3\CMS\Backend\Routing\UriBuilder;

/**
 * Record Hook For Add new Icon
 */
class ModuleRecordListHook implements RecordListHookInterface, SingletonInterface {

	protected $uriBuilder = null;

	/**
	 * Initialize Uri Builder
	 */
	public function __construct() {
		$this->uriBuilder = GeneralUtility::makeInstance(\TYPO3\CMS\Backend\Routing\UriBuilder::class);;
	}

	/**
	 * Functions Extanded But not edited
	 * 3 abstract methods and must therefore be declared abstract or implement the remaining methods
	 */

	public function renderListHeader($table, $currentIdList, $headerColumns, &$parentObject) {
		return $headerColumns;
	}

	
	public function renderListHeaderActions($table, $currentIdList, $cells, &$parentObject) {
		return $cells;
	}

	public function makeClip($table, $row, $cells, &$parentObject) {
			return $cells;
	}

	/**
	 * Add Control
	 */
	public function makeControl($table, $row, $cells, &$parentObject) {

		
		if(isset($GLOBALS['TCA'][$table]['ctrl']['draggable']) && $GLOBALS['TCA'][$table]['ctrl']['draggable']) {
			$url = $this->uriBuilder->buildUriFromRoute('tce_db', []);
			$url_components = parse_url($url);
			parse_str($url_components['query'], $params);
			$newUrl = $url_components['path'].'?route=/record/commit&token='.$params['token'];
			$span = '<span class="btn btn-default draggable"  data-uid="'.$row['uid'].'" data-pid="'.$row['pid'].'" data-table="'.$table.'" data-url="'.$newUrl.'"><span class="t3js-icon icon icon-size-small icon-state-default icon-actions-move-move" data-identifier="actions-move-move">
							<span class="icon-markup">
							<svg class="icon-color" role="img"><use xlink:href="/typo3/sysext/core/Resources/Public/Icons/T3Icons/sprites/actions.svg#actions-drag"></use></svg>
							</span></span></span>';
			// $cells['draggable'] = $span;
			$cells['primary']['draggable'] = $span;
			// Enable Or Disable Single Move Up and Move Down Arrow
			if(isset($cells['primary']['moveUp']) && isset($GLOBALS['TCA'][$table]['ctrl']['disableArrows']) && $GLOBALS['TCA'][$table]['ctrl']['disableArrows']){
				unset($cells['primary']['moveUp']);
				unset($cells['moveUp']);
			}

			if(isset($cells['primary']['moveDown']) && isset($GLOBALS['TCA'][$table]['ctrl']['disableArrows']) && $GLOBALS['TCA'][$table]['ctrl']['disableArrows']){
				unset($cells['primary']['moveDown']);
				unset($cells['moveDown']);
			}
			// Enable Or Disable Single Move Up and Move Down Arrow
		}

		return $cells;
	}	
}
