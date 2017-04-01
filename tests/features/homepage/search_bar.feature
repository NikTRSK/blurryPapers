Feature: Search Bar check
  The Search Bar allows me to enter and delete search.

  Scenario: Check if search bar exists
    Given I am on the homepage "http://localhost:3000"
    Then I expect there to be a "#search-input-box"

  Scenario: Search bar is empty when I do not enter anything
    Given I am on the homepage "http://localhost:3000"
    And I expect there to be a "#search-input-box"
    And I enter nothing
    Then The search bar is empty

  Scenario: I am allowed to search for a researcher's last name
    Given I am on the homepage "http://localhost:3000"
    And I expect there to be a "#search-input-box"
    And I enter "Smith"
#    Then the search bar shows "Smith"
#
#  Scenario: I am allowed to delete my previous search
#    Given I am on Homepage
#    And the search bar shows "Smith"
#    And I deleted "Smith"
#    Then the search bar is empty
