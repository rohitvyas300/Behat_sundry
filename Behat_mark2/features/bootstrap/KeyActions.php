<?php
use Behat\Mink\Mink,
    Behat\Mink\Session,
    Behat\Mink\Driver\Selenium2Driver,
    Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
//use Exception;
/**
 * Defines Wrapper function &  handeling for predefined functions.
 */
 class KeyActions{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
      Handler::FirefoxDriver();   
       // Handler::Chromedriver();   
     // $KeyActions = new KeyActions();
    }//End of default constructor

        /**
         * Wait
         *
         * @param integer $time
         * @param string  $condition
         *
         * 
         */
        public function wait($time = 10000, $condition = null){
            try
            {
                if (!PropertiesAndConstants::$driverSession->getDriver() instanceof Selenium2Driver) {
                    return;
                }
                $start = microtime(true);
                $end = $start + $time / 1000.0;
                if ($condition === null) 
                {
                    $defaultCondition = true;
                    $conditions = [
                        "document.readyState == 'complete'",           // Page is ready
                        "typeof $ != 'undefined'",                     // jQuery is loaded
                        "!$.active",                                   // No ajax request is active
                        "$('#page').css('display') == 'block'",        // Page is displayed (no progress bar)
                        "$('.loading-mask').css('display') == 'none'", // Page is not loading (no black mask loading page)
                        "$('.jstree-loading').length == 0",            // Jstree has finished loading
                    ];
                    $condition = implode(' && ', $conditions);
                } else {
                    $defaultCondition = false;
                }
                // Make sure the AJAX calls are fired up before checking the condition
                PropertiesAndConstants::$driverSession->wait(1000, false);
                PropertiesAndConstants::$driverSession->wait($time, $condition);
                // Check if we reached the timeout unless the condition is false to explicitly wait the specified time
                if ($condition !== false && microtime(true) > $end) {
                    if ($defaultCondition) {
                        foreach ($conditions as $condition) {
                            $result = PropertiesAndConstants::$driverSession->evaluateScript($condition);
                            if (!$result)  {
                                 Echo "Condition times out need to handle Exception here"."\n";
                                    //throw new \Exception(sprintf('Timeout of %d reached when checking on "%s"',$time,$condition);
                                   // throw \Exception('Object cannot be located :(');
                             }
                        }//End of foreach untill all condition set to 0
                    } else 
                    {   
                        throw new \Exception(sprintf('Timeout of %d reached when checking on %s', $time, $condition));
                    }
                }//if all condition not set to 0
          }//End of try
          catch(Exception $err){
            echo 'Caught exception: ',  $err->getMessage(), "\n";
          }  
        }//end of function wait



        public function navigateToUrl($url){
            try{
                 if(!empty($url)) {
                    PropertiesAndConstants::$driverSession->start();
                    echo "Driver started"."\n";
                    $this->wait();
                    PropertiesAndConstants::$driverSession->visit($url);
                    echo "Navigated to Home page"."\n";
                    PropertiesAndConstants::$driverSession->getDriver()->maximizeWindow();
                    echo "window Maximized"."\n";
                } else{
                    echo "Url is null or empty:"."\n";
                    throw new \InvalidArgumentException(sprintf('Url is null or empty: "%s"', $url));
                     Handler::closeDriver();
                  }
                 }//End of try block    
            catch(Exception $e){
                 echo 'Caught exception: ',  $e->getMessage(), "\n";
                 Handler::closeDriver();
            }  
        }//End of function navigateToUrl

        public function click(){
            try{
                 $element = PropertiesAndConstants::$driverSession->getPage()->find('xpath', './/*[@id="home-header-content"]/a');
                
                if(!empty($element) && $element->isVisible()){
                   $element->click();
                   echo "Sucessfully clicked on Chat with us now on home page";
                }
                else{   
                    throw new \Exception('Button is not there yet :(');
                    echo "Button not visible"."\n";
                     Handler::closeDriver();
                }
            }//End of try block
            catch(Exception $e){
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                Handler::closeDriver();
            }
        }//End of function click

        public function verifyElementPresent(){
            try{ 
                echo "Waiting for conditions to load"."\n";
                KeyActions::wait();
                $element = PropertiesAndConstants::$driverSession->getPage()->find('xpath', './/*[@id="olark-container"]/div[1]');
                if(!empty($element)) 
                {
                     if($element->getText() == 'Now Chatting') {  
                        echo "olark chat window Found with verification text Now Chatting :)"."\n";
                    }
                    else{
                        echo "unable to find olark chat :("."\n";
                        throw new \Exception('unable to find olark chat:(');
                        //throw new Exception;   
                    }
                }    
                else{

                    echo "Object cannot be located"."\n";
                    throw \Exception('Object cannot be located :(');
                    Handler::closeDriver();
                }  
            }//End of try block
             catch(Exception $e){
                  echo 'Caught exception: ',  $e->getMessage(), "\n";
                 Handler::closeDriver();
            }
    }//End of function verifyElementPresent

}//End off class KeyActions
