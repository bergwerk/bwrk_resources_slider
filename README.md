*****************************************************
*** 1. TypoScript Definition
*****************************************************

lib.resources_slider >
lib.resources_slider = USER_INT
lib.resources_slider {
    userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
    extensionName = BwrkResourcesSlider
    pluginName = Pi1
}


*****************************************************
*** 2. Fluid Call
*****************************************************

<f:cObject typoscriptObjectPath="lib.resources_slider" />