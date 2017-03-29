const expect = require('chai').expect;

// Check if search bar exists
module.exports = function() {
  this.Given(/^I am on the homepage "([^"]*)"$/, (url) => {
    browser.url(url);
  });

  this.Then(/^I expect there to be a "([^"]*)"$/, (element) => {
    // const searchBar = browser.element(element);
    const searchBar = browser.getHTML(element);
    // const value = searchBar.getAttribute("value");
    console.log(searchBar);
    expect(searchBar).to.exist;
    done();
  });

  this.Then(/^I enter nothing/, (done) => {
    console.log(done);
  });

  this.Then(/^The search bar is empty/, (done) => {
    console.log(done);
  });
};

// // Search bar is empty when I do not enter anything
// module.exports = function() {
//   this.Given(/^I am on the homepage "([^"]*)"$/, (url) => {
//     browser.url(url);
//   });
//
//   this.Then(/^There is a "([^"]*)"$/, (element) => {
//     let searchBox = browser.element(element);
//     console.log(searchBox);
//     // expect(searchBox).state.eql('success');
//       // .expect.searchBox.value.eql()
//   });
//
//   this.Then(/^I enter nothing/, (searchBox) => {
//     // next(searchBox);
//   });
//
//   this.Then(/^The search bar is empty/, (searchBox) => {
//     // console.log(searchBox);
//   });
// };