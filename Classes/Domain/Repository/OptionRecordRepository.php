<?php
namespace ChrisGruen\Ajaxselectlist\Domain\Repository;

/**
 * The repository for OptionRecords
 */
class OptionRecordRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array(
            'title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );
}