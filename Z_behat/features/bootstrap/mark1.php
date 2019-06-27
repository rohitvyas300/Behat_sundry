<?php
  // Setup: $ php composer.phar require facebook/webdriver
 
  require_once('vendor/autoload.php');
  use Facebook\WebDriver\Remote\RemoteWebDriver;
  use Facebook\WebDriver\WebDriverBy;
 
  $web_driver = RemoteWebDriver::create(
    "https://rohitv:893e78f8-618c-4066-816d-180882528e6d@ondemand.saucelabs.com:443/wd/hub",
    array("platformName"=>"Android", "platformVersion"=>"7", "deviceName"=>"LG_Nexus_5X_free","testobject_api_key"=>"A1847E03C4E0435E8B9D27EB05FB89B6",)
  );
  $web_driver->get("https://www.reservation-desk.com/");
 
  /*
    Test actions here...
  */
 
  $web_driver->quit();
?>