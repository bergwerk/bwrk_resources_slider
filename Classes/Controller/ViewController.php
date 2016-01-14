<?php

namespace BERGWERK\BwrkResourcesSlider\Controller;

use BERGWERK\BwrkResourcesSlider\Domain\Model\Page;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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

    public function initializeAction()
    {
        parent::initializeAction();
    }

    public function indexAction()
    {
        $pageWithMedia = $this->getRecursiveParentWithMedia($this->pid);
        if($pageWithMedia != false)
        {
            $this->view->assign('data', array(
                'media' => $pageWithMedia->getMedia()
            ));
        }
    }

    /**
     * @param $pid
     * @return Page
     */
    private function getRecursiveParentWithMedia($pid)
    {
        /** @var Page $page */
        $page = $this->pageRepository->findByUid($pid);
        if($page->getMedia()->count() == 0)
        {
            if($page->getPid() == 0) return false;

            return $this->getRecursiveParentWithMedia($page->getPid());
        }
        return $page;
    }
}