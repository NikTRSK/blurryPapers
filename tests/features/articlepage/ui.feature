Feature: Article Item Components check
  The article entries will each be their own component and I should be able to view a list of ariticles that contain the word that was clicked on from the Word Cloud.

  #Test 2
  @javascript
  Scenario: Check for articles on the article page
    Given I go to the website "http://localhost:3000"
    And I have done a search for "Smith"
    And a Word Cloud has been generated
    And I select a word from the Word Cloud
    When I am on the author page
    Then I expect a list of Articles to display under the title

  #Test 3
  @javascript
  Scenario: Check for author(s) of article on article page
    Given I go to the website "http://localhost:3000"
    And I have done a search for a "Smith"
    And a Word Cloud has been generated
    And I select a word from the Word Cloud
    When I am on the author page
    Then I expect the article component to list the authors

  #Test 4
  @javascript
  Scenario: Check for button to view article in BibTex
    Given I go to the website "http://localhost:3000"
    And I have done a search for a "Smith"
    And a Word Cloud has been generated
    And I select a word from the Word Cloud
    When I am on the author page
    Then I expect to see a button allowing me to view the article's BibTex

  #Test 5
  @javascript
  Scenario: Check for the Download button that links to the article
    Given I go to the website "http://localhost:3000"
    And I have done a search for "Smith"
    And a Word Cloud has been generated
    And I select a word from the Word Cloud
    When I click on the Download button
    Then I expect a Download window to pop up