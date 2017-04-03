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
};

module.exports = searchBarTests;