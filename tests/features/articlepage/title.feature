Feature: Title check
  I should be able to load the page after clicking on a word from the Word Cloud and check its title

  #Test 1
  @javascript
  Scenario: Get the title of webpage
    Given I go to the website "http://localhost:3000"
    And I have done a search for "Smith"
    And a Word Cloud has been generated
    When I select a word from the Word Cloud
    Then I expect the title of the author page to be <selected-word>








