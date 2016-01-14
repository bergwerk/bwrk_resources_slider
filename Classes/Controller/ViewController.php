<?php

namespace BERGWERK\BwrkResourcesSlider\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Georg Dümmler <gd@bergwerk.ag>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 *
 * @author	Georg Dümmler <gd@bergwerk.ag>
 * @package	TYPO3
 * @subpackage	bwrk_resources_slider
 ***************************************************************/

use BERGWERK\BwrkResourcesSlider\Domain\Model\Page;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class ViewController
 * @package BERGWERK\BwrkResourcesSlider\Controller
 */
class ViewController extends ActionController
{
    /**
     * @var \BERGWERK\BwrkResourcesSlider\Domain\Repository\PageRepository
     * @inject
     */
    protected $pageRepository;

    /**
     * @var \BERGWERK\BwrkResourcesSlider\Utility\CacheUtility
     * @inject
     */
    protected $cacheUtility;

    /**
     * @var int
     */
    protected $pid;

    /**
     * @var string
     */
    protected $cacheIdentifier;

    /**
     * ViewController constructor.
     */
    function __construct()
    {
        parent::__construct();

        $this->pid = $GLOBALS['TSFE']->id;
        $this->cacheIdentifier = $this->getCacheIdentifier();
    }

    /**
     * @return bool|mixed
     */
    public function indexAction()
    {
        $cachedHtmlOutput = $this->cacheUtility->getCache($this->cacheIdentifier);
        if(!$cachedHtmlOutput) {

            $pageWithMedia = $this->getRecursiveParentWithMedia($this->pid);
            if ($pageWithMedia != false) {
                $this->view->assign('data', array(
                    'media' => $pageWithMedia->getMedia()
                ));
            }

            $htmlOutput = $this->view->render();
            $this->cacheUtility->setCache($htmlOutput, $this->cacheIdentifier);

            return $htmlOutput;
        }
        return $cachedHtmlOutput;
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

    /**
     * @return string
     */
    private function getCacheIdentifier()
    {
        $cacheIdentifier = $this->actionMethodName.$this->pid;
        if(!is_null($GLOBALS['TSFE']->fe_user->user))
        {
            $cacheIdentifier.= $GLOBALS['TSFE']->fe_user->user['ses_id'];
        }
        return $cacheIdentifier;
    }
}