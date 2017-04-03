Feature: Be able to view the abstract of an article
  I should be able to view the abstract of an article when I click on the article title

  #Test 11
  @javascript
  Scenario: Abstract popup
    Given I am on the homepage "http://localhost:3000"
    When I enter "Smith" in the "#search-input-box"
    When There is a "#word-cloud"
    When I have selected a word from the Word Cloud
    When I am on the artist page
    When I click on the article title
    Then I expect to see a popup containing the article's abstract