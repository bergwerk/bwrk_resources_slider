<?php
namespace BERGWERK\BwrkResourcesSlider\Domain\Repository;

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

use BERGWERK\BwrkFluidmenu\Bootstrap;

class PageRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function initializeObject()
    {
        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface $querySettings */
        $querySettings = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface');
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }

    /**
     * @return static
     */
    static public function create()
    {
        return Bootstrap::getObjectManager()->get(get_called_class());
    }
}