//generate_new_wc.feature
Feature: The ability to regenerate a word cloud from selected articles

  @javascript
  Scenario: Regenerate from selected articles
    Given I am on the homepage "http://localhost:8888"
    When I enter "Smith" in the "#search-input-box"
    When The "#search-button" is clicked
    When I select a "productions" from the "#word-cloud"



    /*digital_library_download.feature*/
