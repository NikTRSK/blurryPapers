const expect = require('chai').expect;

const searchBarTests = function () {

  this.Given(/^I am on the homepage "([^"]*)"$/, (url) => {
    browser.url(url);
  });

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
};

module.exports = searchBarTests;