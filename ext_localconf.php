<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Chrisgruen.ajaxselectlist',
    'Selectlist',
    [
        'OptionRecord' => 'list, ajaxCall',
    ],
    // non-cacheable actions
    [
        'OptionRecord' => '',
    ]
);
