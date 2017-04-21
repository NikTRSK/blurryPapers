Feature: This will test for the user's ability to sort on the author page

  @javascript
  Scenario: Sort by Title name
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "the" from the "#word-cloud"
    When I select the "

  @javascript
  Scenario: Sort for Author name
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "the" from the "#word-cloud"

  @javascript
  Scenario: Sort for number of Occurences
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "the" from the "#word-cloud"

  @javascript
  Scenario: Sort by Conference name
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "the" from the "#word-cloud"
