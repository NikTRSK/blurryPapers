#Feature: Search Button check
#  There is a search Button, and once I clicked on the search Button, there should be a word cloud generated.
#
#  @javascript
#  Scenario: When I do not search for anything, do not research anything.
#    Given I am on the homepage and don't search for anything
#    Then The "#word-cloud" is empty

#  @javascript
#  Scenario: When I search for a researcher by their last name, a word cloud is generated.
#    Given I am on the homepage "http://localhost:3000/"
#    And I enter "Smith" in the "#search-input-box"
#    And I click the "#search-button"
#    Then The "#word-cloud" shows up