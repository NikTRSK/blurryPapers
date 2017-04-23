Feature: Be able to generate a new word cloud from clicking on a

  @javascript
  Scenario: Perform a new search based on the Author's name that was clicked
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"
    When I click on the author
    Then I should see a new Word Cloud