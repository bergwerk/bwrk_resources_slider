<?php
namespace BERGWERK\BwrkResourcesSlider;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class Bootstrap
{
	/**
	 * @return \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	static public function getObjectManager()
	{
		return GeneralUtility::makeInstance(
			'TYPO3\\CMS\\Extbase\\Object\\ObjectManager'
		);
	}
}