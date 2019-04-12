<?php
namespace Tests\Oxid\search;

use Tests\Oxid\AcceptanceTester;
use Tests\Oxid\Page\Startpage;

class SearchCest
{
    public function _before(AcceptanceTester $I, Startpage $page)
    {
        $I->amOnPage($page::$URL);
        $I->waitForElement($page::$searchOpener);
    }

    public function searchWithValidWordIsWorking(AcceptanceTester $I, Startpage $page)
    {
        $searchString = 'e-commerce';
        $I->click($page::$searchOpener);
        $I->fillField($page::$searchInput, $searchString);
        $I->click($page::$searchButton);

        $I->waitForElementVisible($page::$searchResultPageHeadline);
        $I->canSeeInCurrentUrl('s=' . $searchString);
        $I->assertEquals($searchString, $I->grabValueFrom($page::$searchInput));
        $I->assertEquals($searchString, $I->grabValueFrom($page::$searchResultInput));

        $headlines = $I->grabMultiple($page::$searchResultItemHeadlines);
        foreach ($headlines as $key => $headline) {
            $I->assertContains($searchString, strtolower($headline), 'Line: ' . ($key + 1));
        }

        $I->assertEquals(10, count($headlines));
        $count = (int) $I->grabTextFrom($page::$searchResultPageHeadline);
        $I->assertGreaterThan(150, $count);
    }
}
