<?php

use Behat\Mink\Mink,
    Behat\Mink\Session,
    Behat\Mink\Driver\Selenium2Driver,
    Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
//use Behat3\features\bootstrap\KeyActions;


/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        //creting object for keyaction class
        $this->keyaction =  new KeyActions();
       $this->Handler = new Handler();
    }//end of construct


        //$keyaction = new KeyActions();

        /**
        * @Given /^I Am On "([^"]*)"$/
        */
        public function iAmOn($command)
        {
            //$keyaction = new KeyActions();
           $this->keyaction->navigateToUrl($command);
        }

        /**
        * @When /^I Click "([^"]*)"$/
        */
        public function iClick($command)
        {
            $this->keyaction->click();
        }

        /**
        * @Then /^I Should See "([^"]*)"$/
        */
        public function iShouldSee($fileName)
        { 
             $this->keyaction->verifyElementPresent();
             $this->Handler->closeDriver();
        }


}//End of class FeatureContexts
