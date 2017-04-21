Feature: Verify that the bibtex button is doing what it should be able to do

  @javascript
  Scenario: Check that the bibtex is accesible for the article
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"
    //If I click on the bibtex-button
    //Then I should be able to see a popup with the information
