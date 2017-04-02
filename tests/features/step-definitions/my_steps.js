// const expect = require('chai').expect;
//
// let myStepDefinitionsWrapper = function () {
//
//   const url = "http://localhost:3000";
//   let searchBar;
//
//   this.Given(/^I am on the homepage "([^"]*)"$/, (url) => {
//     browser.url(url);
//   });
//
//   this.Then(/^I expect there to be a "([^"]*)"$/, (element) => {
//     searchBar = $(element);
//     expect(searchBar.state).to.eq('success');
//   });
//
//   this.Then(/^I enter nothing$/, () => {
//     searchBar.setValue("");
//   });
//
//   this.Then(/^The search bar is empty$/, () => {
//     browser.url(url);
//     searchBar = $('search-input-bar');
//     expect(searchBar.getValue()).to.be.empty;
//   });
//
//   this.Then(/^I enter "([^"]*)"$/, (input) => {
//     searchBar.setValue(input);
//   });
//
//   this.Then(/^The search bar shows "([^"]*)"$/, (input) => {
//     expect(searchBar.getValue()).to.eq(input);
//   });
//
//
//   this.Given(/^I am on the homepage "([^"]*)"$/, (url) => {
//     browser.url(url);
//   });
//
//   this.When(/^The "([^"]*)" is empty$/, (arg) => {
//     browser.url(url);
//     console.log("INPUT SEARCH");
//     searchBar = $(arg);
//     searchBar.setValue("");
//   });
//
//   this.When(/^I click the "\#search\-button"$/, function (arg1) {
//     browser.url(this.url);
//     let searcButton = $(arg1);
//     searcButton.click();
//   });
//
//   this.Then(/^The "\#word\-cloud" is empty$/, function (arg1) {
//     let wordCloud = $(arg1);
//     console.log("WORDCLOUD");
//     console.log(wordCloud);
//   });
//
//   this.Given(/^I enter "([^"]*)" in the "\#search\-input\-box"$/, function (arg1, arg2, callback) {
//     // callback.pending();
//   });
//
//   this.Then(/^The "\#word\-cloud" shows up$/, function (arg1, callback) {
//     // callback.pending();
//   });
// };
// module.exports = myStepDefinitionsWrapper;