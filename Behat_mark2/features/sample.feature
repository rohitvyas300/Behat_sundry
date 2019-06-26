Feature: Testing Behat install
        This is a testing feature to see if everything
        is working correctly

        @javascript
        Scenario: My first test
                Given I Am On "https://www.reservation-desk.com/"
                When I Click "Chat with us"
                Then I Should See "olark chat"