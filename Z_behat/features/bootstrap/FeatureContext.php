<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

require_once('/Users/macbook/Documents/behat/Z_behat/vendor/appium/php-client/PHPUnit/Extensions/AppiumTestCase.php');
require_once('/Users/macbook/Documents/behat/Z_behat/vendor/appium/php-client/PHPUnit/Extensions/AppiumTestCase/Element.php');
/**
 * Defines application features from the specific context.
 */
//class FeatureContext extends PHPUnit_Extensions_AppiumTestCase  implements Context, SnippetAcceptingContext
class FeatureContext extends PHPUnit_Extensions_AppiumTestCase  implements Context, SnippetAcceptingContext
{    
     static $browsers = array(           
        array(
            'local' => true,
            'host' => 'rohitv:893e78f8-618c-4066-816d-180882528e6d@eu1.appium.testobject.com',
            'port' => 443,
            'browserName' => 'chrome',            
            'desiredCapabilities' => array(
                'platformName' => 'Android',
                'platformVersion' => '7',
                'deviceName' => 'LG_Nexus_5X_free',
                'testobject_api_key' => 'A1847E03C4E0435E8B9D27EB05FB89B6',              
            )
        )
    );
 
 public function testStuff()
    {        
       //'baseurl' => 'https://www.reservation-desk.com/'
     //'host' => 'rohitv:893e78f8-618c-4066-816d-180882528e6d@eu1.appium.testobject.com',
                echo "command..... \n";    		
    		$this->url('https://www.reservation-desk.com/');
    		sleep(5);  
    		$this->byId('fusion-header-menu')->click();
    		echo "clicked,,,,, \n";		
    }
    
}
