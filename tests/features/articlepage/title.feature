Feature: Title check
  I should be able to load the page after clicking on a word from the Word Cloud and check its title

  #Test 1
  @javascript
  Scenario: Get the title of webpage
    Given I am on the homepage "http://localhost:3000"
    When I enter "Smith" in the "#search-input-box"
    When There is a "#word-cloud"
    When I select a word from the Word Cloud
    Then I expect the title of the author page to be <selected-word>








