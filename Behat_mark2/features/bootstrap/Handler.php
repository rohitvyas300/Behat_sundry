<?php

use Behat\Mink\Mink,
    Behat\Mink\Session,
    Behat\Mink\Driver\Selenium2Driver,
    Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
/**
 * Defines Session for the driver.
 */
 class Handler
{
    public static $driver ;
    public static $session;
    public function __construct()
    {
    }
        public function FirefoxDriver()
        {
            echo $command.".......";
            $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');            
            $session = new Behat\Mink\Session($driver);
            PropertiesAndConstants::$driverSession = $session;
            return $driverSession;
        }

        public function closeDriver()
        {
          PropertiesAndConstants::$driverSession->stop();
        }

}//End of class Handler
