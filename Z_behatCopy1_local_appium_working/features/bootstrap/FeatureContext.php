<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

require_once('/Users/macbook/Documents/Behat_Appium/Z_behat/vendor/appium/php-client/PHPUnit/Extensions/AppiumTestCase.php');
require_once('/Users/macbook/Documents/Behat_Appium/Z_behat/vendor/appium/php-client/PHPUnit/Extensions/AppiumTestCase/Element.php');
/**
 * Defines application features from the specific context.
 */
//class FeatureContext extends PHPUnit_Extensions_AppiumTestCase  implements Context, SnippetAcceptingContext
class FeatureContext extends PHPUnit_Extensions_AppiumTestCase  implements Context, SnippetAcceptingContext
//class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext        
{    
    
    // public static $browsers = array(    
    //     array(
    //         'local' => true,
    //         'host' => '127.0.0.1',
    //         'port' => 4723,
    //         'browserName' => 'chrome',            
    //         'desiredCapabilities' => array(
    //             'platformName' => 'Android',
    //             'platformVersion' => '6',
    //             'deviceName' => 'moto',
    //             'wd_host' => 'https://rohitv:893e78f8-618c-4066-816d-180882528e6d@ondemand.saucelabs.com:80/wd/hub',
    //             'baseurl' => 'https://www.reservation-desk.com/'
    //         )
    //     )
    // );

    
//static $browsers = array(           
//        array(
//            'local' => true,
//            'host' => 'localhost',
//            'port' => 443,
//            'browserName' => 'chrome',            
//            'desiredCapabilities' => array(
//                'platformName' => 'Android',
//                'platformVersion' => '7',
//                'deviceName' => 'LG_Nexus_5X_free',
//                'testobject_api_key' => 'A1847E03C4E0435E8B9D27EB05FB89B6',
//                'baseurl' => 'https://www.reservation-desk.com/'
//            )
//        )
//    );
 
 public function testStuff1()
    {        
     //'host' => 'rohitv:893e78f8-618c-4066-816d-180882528e6d@eu1.appium.testobject.com',
     //'port' => 443,
       //'baseurl' => 'https://www.reservation-desk.com/'
     //'host' => 'rohitv:893e78f8-618c-4066-816d-180882528e6d@eu1.appium.testobject.com',
                echo "command..... \n";    		
    		//$this->url('https://www.reservation-desk.com/');
    		//sleep(5);  
    		//$this->byId('fusion-header-menu')->click();
    		echo "clicked,,,,, \n";	
                //$this->iAmOnBlogsPage();
    }
    
    /**
     * @Given \/^I am on blogs page$\/
     */
    public function testStuff()
    {
        //'deviceName' => 'samsung',
      //  'wd_host' => 'https://rohitv:893e78f8-618c-4066-816d-180882528e6d@ondemand.saucelabs.com:443/wd/hub',
        echo "command..... \n";
        
        
        echo "command..... \n";
    		//$driver = RemoteWebDriver::create('')
    		//$this->url('https://www.reservation-desk.com/');
    		//sleep(5);  
    		//$this->byId('fusion-header-menu')->click();
    		echo "clicked,,,,, \n";
    		//$this->byAccessibilityId('fusion-header-menu')->click();
    		//usion-header-menu
    	    
            $session1 = new PHPUnit_Extensions_AppiumTestCase_SessionStrategy_Isolated();    
            // $session1->session($parameters);   
                
            $driver = new \Behat\Mink\Driver\Selenium2Driver($browsers);
            $session = new Behat\Mink\Session($driver);
            $driverSession = $session;            	
            $driverSession->start();            
                    echo "Driver started"."\n";
            $this->setUpPage('/');
           $driverSession->visit('https://www.reservation-desk.com/');
                    echo "Navigated to Home page"."\n";
           $driverSession->getDriver()->maximizeWindow();
                    echo "window Maximized"."\n";
              sleep(5);   
    }
    
}
