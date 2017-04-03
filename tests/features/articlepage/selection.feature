Feature: The ability to select articles from the articles page
  I should be able to select articles from the articles page

  #Test 10
  @javascript
  Scenario: Checkbox next to the article name
    Given I go to the website "http://localhost:3000"
    And I have done a search for "Smith"
    And a Word Cloud has been generated
    When I am on the artist page
    Then I expect to see a checkbox next to the article title

