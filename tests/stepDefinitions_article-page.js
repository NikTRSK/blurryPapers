//Feature: Title Check
//Test_1:Test to check that the page has the right title
//              (the word that was selected from the word chart)
var myStepDefinitionsWrapper = function () {

    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I am on the author page$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect the title of the author page to be (.*)$/, function (callback) {
        callback.pending();
    });
};

//Test_2: Check that there is a list of items (Or else the list should
//      not have been generated in the first place)
var myStepDefinitionsWrapper = function () {

    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I am on the author page$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect a list of Articles to display under the title$/, function (callback) {
        callback.pending();
    });
};

//Test_3: Check that the author’s name shows up under the article title
var myStepDefinitionsWrapper = function () {
    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I am on the author page$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect the article component to list the authors$/, function (callback) {
        callback.pending();
    });
};

//Test_4: Check that they are able to access it’s bibTex (through a button)
var myStepDefinitionsWrapper = function () {
    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I am on the author page$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect to see a button allowing me to view the article's BibTex$/, function (callback) {
        callback.pending();
    });
};

//Test_5: Check that they are able to download the article through the link (in the button)
var myStepDefinitionsWrapper = function () {
    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I click on the Download button$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect a Download window to pop up$/, function (callback) {
        callback.pending();
    });
};
//Next Feature
//Test_6: Check that they are able to generate a new Word Cloud from clicking on author name
var myStepDefinitionsWrapper = function () {
    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I select an author from the author page$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect a new Word Cloud to generate using the authors information$/, function (callback) {
        callback.pending();
    });
};

//Test_7: Check to generate new WC from selected articles
var myStepDefinitionsWrapper = function () {
    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select articles from the article list$/, function (callback) {
        callback.pending();
    });
    this.When(/^I click the button to generate a new Word Cloud from selected articles$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect a new Word Cloud to generate using the selected articles$/, function (callback) {
        callback.pending();
    });
};

//Feature:Buttons to download
//Test_8:Check that they are able to download the article as txt
var myStepDefinitionsWrapper = function () {

    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I am on the author page$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect to see a button that would allow me to download the article as a text$/, function (callback) {
        callback.pending();
    });
};

//Test_9: Check that they are able to download the article as pdf
var myStepDefinitionsWrapper = function () {

    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I am on the author page$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect to see a button that allows the user to download the article as a PDF$/, function (callback) {
        callback.pending();
    });
};

//Test_10:Check that the user is able to check an article’s checkbox
var myStepDefinitionsWrapper = function () {

    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.When(/^I am on the author page$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect to see a checkbox next to the article title$/, function (callback) {
        callback.pending();
    });
};

//Test_11 Check that the abstract pops up
var myStepDefinitionsWrapper = function () {

    this.Given(/^I go to the website "http:\/\/localhost:3000"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^I have done a search for "([^"]*)"$/, function (arg1, callback) {
        callback.pending();
    });
    this.Given(/^a Word Cloud has been generated$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I select a word from the Word Cloud$/, function (callback) {
        callback.pending();
    });
    this.Given(/^I am on the author page$/, function (callback) {
        callback.pending();
    });
    this.When(/^I click on the article title$/, function (callback) {
        callback.pending();
    });
    this.Then(/^I expect to see a popup containing the article's abstract$/, function (callback) {
        callback.pending();
    });
};

module.exports = myStepDefinitionsWrapper;