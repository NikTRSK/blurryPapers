Feature: Generate a new paper list based off of the conference that was selected

  @javascript
  Scenario: Generate from clicking on conference name
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"
