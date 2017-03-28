Feature: Search Button check
  There is a search Button, and once I clicked on the search Button, there should be a word cloud generated.



  @javascript
  Scenario: When I do not search for anything, do not research anything.
    Given I am on Homepage
    And the search bar is empty
    And I click the search button
    Then the word cloud is empty

  @javascript
  Scenario: When I search for a researcher by their last name, a word cloud is generated.
    Given I am on Homepage
    And I enter "Smith"
    And I click the search button
    Then the word cloud shows up

