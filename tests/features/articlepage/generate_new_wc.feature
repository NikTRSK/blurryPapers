Feature: The ability to regenerate a word cloud from selected articles

  @javascript
  Scenario: Regenerate from selected articles
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"
    When I check the first 2 conferences
    When I click on "articles-generate-button"
    Then I should see a new Word Cloud

