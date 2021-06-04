<?php
namespace ChrisGruen\Ajaxselectlist\Controller;

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * OptionRecordController
 */
class OptionRecordController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * optionRecordRepository
     *
     * @var \ChrisGruen\Ajaxselectlist\Domain\Repository\OptionRecordRepository
     * @inject
     */
    protected $optionRecordRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $optionRecords = $this->optionRecordRepository->findAll();
        $this->view->assign('optionRecords', $optionRecords);
        $this->view->assign("currentPageID", $GLOBALS['TSFE']->id);

        // Check if the given TYPO3 uses the new language aspect (since TYPO3 9.4):
        if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_version) >= 9004000) {
            $languageAspect = GeneralUtility::makeInstance(Context::class)->getAspect('language');
            $lang = $languageAspect->getId();
            $this->view->assign("sysLanguageUid", $lang);
        } else {
            $this->view->assign("sysLanguageUid", $GLOBALS['TSFE']->sys_language_uid);
        }
    }

    /**
     * action ajaxCall
     *
     * @param \ChrisGruen\Ajaxselectlist\Domain\Model\OptionRecord $optionRecord
     * @return void
     */
    public function ajaxCallAction(\ChrisGruen\Ajaxselectlist\Domain\Model\OptionRecord $optionRecord)
    {
        $this->view->assign('optionRecord', $optionRecord);
    }
}