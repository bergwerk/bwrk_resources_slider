<?php

namespace BERGWERK\BwrkResourcesSlider\Domain\Model;

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
 * @author    Georg Dümmler <gd@bergwerk.ag>
 * @package    TYPO3
 * @subpackage    bwrk_resources_slider
 ***************************************************************/

/**
 * Class Page
 * @package BERGWERK\BwrkResourcesSlider\Domain\Model
 */
class Page extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var int
     */
    protected $pid = 0;


    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $media;


    /**
     * @return int
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param int $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param \TYPO3\CMS\Core\Resource\FileReference $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

}