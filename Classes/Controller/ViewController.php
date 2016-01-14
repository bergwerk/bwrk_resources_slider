<?php

namespace BERGWERK\BwrkResourcesSlider\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class ViewController extends ActionController
{
    /**
     * @var \BERGWERK\BwrkResourcesSlider\Domain\Repository\PageRepository
     * @inject
     */
    protected $pageRepository;

    /**
     * @var int
     */
    protected $pid;

    function __construct()
    {
        parent::__construct();

        $this->pid = $GLOBALS['TSFE']->id;
    }

    public function indexAction()
    {

    }
}