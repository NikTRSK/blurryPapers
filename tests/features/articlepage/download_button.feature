Feature: Buttons to download the list of selected artiles
  I should be able to download the list of checked articles from the artist page either as text or PDF.

   #Test 8
  @javascript
  Scenario: Check for Download text button
    Given I am on the homepage "http://localhost:3000"
    When I enter "Smith" in the "#search-input-box"
    When There is a "#word-cloud"
    When The "#search-button" is clicked
#    When I click on "TagCloud" "tags[1]"
#    When I am on the author list page "http://localhost:3000/paperlist/"
#    Then I expect to see a "#articles-dl-txt-button" download button with the text "Download List as TXT"

  #Test 9
  @javascript
  Scenario: Check for Download PDF button
    Given I am on the homepage "http://localhost:3000"
    When I enter "Smith" in the "#search-input-box"
    When There is a "#word-cloud"
    When The "#search-button" is clicked
#    When I am on the artist page
#    Then I expect to see a button that allows the user to download the article as a PDF
