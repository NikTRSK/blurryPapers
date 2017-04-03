Feature: Buttons to download the list of selected artiles
  I should be able to download the list of checked articles from the artist page either as text or PDF.

   #Test 8
  @javascript
  Scenario: Check for Download text button
    Given I am on the homepage "http://localhost:3000"
    When I enter "Smith" in the "#search-input-box"
    When a Word Cloud has been generated
    When I select a word from the Word Cloud
    When I am on the author page
    Then I expect to see a button that would allow me to download the article as a text

  #Test 9
  @javascript
  Scenario: Check for Download PDF button
    Given I am on the homepage "http://localhost:3000"
    When I enter "Smith" in the "#search-input-box"
    When a Word Cloud has been generated
    When I select a word from the Word Cloud
    When I am on the artist page
    Then I expect to see a button that allows the user to download the article as a PDF
