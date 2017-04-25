Feature: User can download a paper with the word highlighted in it.

  @javascript
  Scenario: Check that the paper is downloaded with highlights
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "way" from the "#word-cloud"
    When I click on "#article-title"
    When I click on "#highlight-dl-button"
    Then I should download the article with way highlighted