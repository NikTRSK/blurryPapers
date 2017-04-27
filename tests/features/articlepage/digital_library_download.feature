Feature: User should be able to download the paper from the digital library

  @javascript
  Scenario: Check that can access link to download paper
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "way" from the "#word-cloud"
    When I click on link
    Then I should download the article