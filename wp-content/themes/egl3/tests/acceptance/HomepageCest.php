<?php

/**
 * Code ception docs: https://codeception.com/docs/03-AcceptanceTests
 * Make sure to run "selenium-standalone start" in a new terminal before running any tests

 * Run All tests in this suite in terminal from the themes directory: 
 * vendor/bin/codecept run acceptance HomepageCest
 * 
 * Run single test from this class: 
 * vendor/bin/codecept run acceptance HomepageCest:{TEST_NAME_HERE}
 * EX: vendor/bin/codecept run acceptance HomepageCest:frontpageWorks
 * 
 */
class HomepageCest
{
    public $standard_wait_secs = 5;
    public $homepage_text = 'This text should be on the homepage';

    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->wait($this->standard_wait_secs);
        $I->see($this->homepage_text);
    }
}
