<?php

namespace Soft2do\Draggable;
use \TYPO3\CMS\Core\Imaging\IconFactory;
use \TYPO3\CMS\Backend\Routing\UriBuilder;
use \TYPO3\CMS\Backend\Configuration\TranslationConfigurationProvider;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Page\PageRenderer;
use \Psr\EventDispatcher\EventDispatcherInterface;
class DatabaseRecordList extends \TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList {

	protected IconFactory $iconFactory;
    protected UriBuilder $uriBuilder;
	protected TranslationConfigurationProvider $translateTools;


	public function __construct(IconFactory $iconFactory,
								UriBuilder $uriBuilder,
								TranslationConfigurationProvider $translateTools,
								EventDispatcherInterface $eventDispatcher
		) {
		parent::__construct($iconFactory, $uriBuilder,$translateTools,$eventDispatcher);
		$renderer =GeneralUtility::makeInstance(PageRenderer::class);
		$renderer->addJsFile('/typo3conf/ext/moduleview_draggable/Resources/Public/JavaScript/RecordListDrag.js', 'text/javascript', false, false, '', true, '|', false, '');
	}
}

