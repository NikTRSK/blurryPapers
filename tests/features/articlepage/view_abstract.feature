Feature: Be able to view the abstract of an article
  I should be able to view the abstract of an article when I click on the article title

  #Test 11
  @javascript
  Scenario: Abstract popup
    Given I go to the website "http://localhost:3000"
    And I have done a search for "Smith"
    And a Word Cloud has been generated
    And I have selected a word from the Word Cloud
    And I am on the artist page
    When I click on the article title
    Then I expect to see a popup containing the article's abstract