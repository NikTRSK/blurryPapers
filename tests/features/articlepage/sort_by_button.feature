Feature: This will test for the user's ability to sort on the author page

  @javascript
  Scenario: Sort by Title name
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"
    When The "#dropdown-toolbar" is clicked
    When I click on the sort by "#sort-title" option
    Then I should see the articles to be sorted by Title alphabetically

  @javascript
  Scenario: Sort for Author name
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"
    When The "#dropdown-toolbar" is clicked
    When I click on the sort by "#sort-authors" option
    Then I should see the articles to be sorted by Author name

  @javascript
  Scenario: Sort for number of occurrences
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"
    When The "#dropdown-toolbar" is clicked
    When I click on the sort by "#sort-frequency" option
    Then I should see the articles to be sorted by number of occurences

  @javascript
  Scenario: Sort by Conference name
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"
    When The "#dropdown-toolbar" is clicked
    When I click on the sort by "#sort-conferences" option
    Then I should see the articles to be sorted by Conferences alphabetically