const expect = require('chai').expect;

const searchBarTests = function () {

  this.Given(/^I am on the homepage "([^"]*)"$/, (url) => {
    browser.url(url);
  });

  // search_bar.feature
  this.Then(/^I expect there to be a "([^"]*)"$/, (element) => {
    this.searchBar = $(element);
    expect(this.searchBar.state).to.eq('success');
  });

  this.When(/^I enter nothing in the "([^"]*)"$/, (element) => {
    $(element).setValue("");
  });

  this.Then(/^The "([^"]*)" is empty$/, (element) => {
    expect($(element).getValue()).to.be.empty;
  });

  this.When(/^I enter "([^"]*)" in the "([^"]*)"$/, (search, element) => {
    $(element).setValue(search);
  });

  this.Then(/^The "([^"]*)" shows "([^"]*)"$/, (element, input) => {
    expect($(element).getValue()).to.eq(input);
  });


  // search_button.feature
  this.Then(/^I expect a "([^"]*)" with the text "([^"]*)"$/, (element, text) => {
    let btn = $(element);
    expect(btn.state).to.eq('success');
    expect(btn.getText()).to.eq('Search');
  });

  // word_cloud.feature
  this.Then(/^There is not a "([^"]*)"$/, (element) => {
    let wordCloud = $(element);
    console.log(wordCloud.value.ELEMENT);
    expect(wordCloud.value.ELEMENT).to.eq('0');
  });

  this.Then(/^There is a "([^"]*)"$/, (element) => {
    let wordCloud = $(element);
    console.log(wordCloud.value.ELEMENT);
    expect(wordCloud.value.ELEMENT).to.not.eq('0');
  });


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

module.exports = searchBarTests;