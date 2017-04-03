Feature: Title check
  I should be able to load the page after clicking on a word from the Word Cloud and check its title

  #Test 1
  @javascript
Scenario: Get the title of webpage
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  Then I expect the title of the author page to be <selected-word>

  #Test 2
@javascript
Scenario: Check for articles on the article page
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  When I am on the author page
  Then I expect a list of Articles to display under the title

  #Test 3
@javascript
Scenario: Check for author(s) of article on article page
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for a "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  When I am on the author page
  Then I expect the article component to list the authors

  #Test 4
@javascript
Scenario: Check for button to view article in BibTex
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for a "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  When I am on the author page
  Then I expect to see a button allowing me to view the article's BibTex

  #Test 5
@javascript
Scenario: Check for the Download button that links to the article
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  When I click on the Download button
  Then I expect a Download window to pop up

  #Test 6
@javascript
Scenario: Generate new Word Cloud from Author
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  When I select an author from the author page
  Then I expect a new Word Cloud to generate using the authors information

  #Test 7
@javascript
Scenario: Generate new Word Cloud from Articles
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  When I select articles from the article list
  When I click the button to generate a new Word Cloud from selected articles
  Then I expect a new Word Cloud to generate using the selected articles

  #Test 8
@javascript
Scenario: Check for Download text button
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  When I am on the author page
  Then I expect to see a button that would allow me to download the article as a text

  #Test 9
@javascript
Scenario: Check for Download PDF button
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I select a word from the Word Cloud
  When I am on the artist page
  Then I expect to see a button that allows the user to download the article as a PDF

  #Test 10
@javascript
Scenario: Checkbox next to the article name
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I am on the artist page
  Then I expect to see a checkbox next to the article title

  #Test 11
@javascript
Scenario: Abstract popup
  Given I am on the homepage "http://localhost:3000"
  When I have done a search for "Smith"
  When a Word Cloud has been generated
  When I have selected a word from the Word Cloud
  When I am on the artist page
  When I click on the article title
  Then I expect to see a popup containing the article's abstract
