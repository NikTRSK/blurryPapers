let searchButtonDefinitions = function () {

  this.Given(/^I click the "\#search\-button"$/, function (arg1, callback) {
    callback.pending();
  });

  this.Then(/^The "\#word\-cloud" is empty$/, function (arg1, callback) {
    callback.pending();
  });

  this.Given(/^I enter "([^"]*)" in the "\#search\-input\-box"$/, function (arg1, arg2, callback) {
    callback.pending();
  });

  this.Then(/^The "\#word\-cloud" shows up$/, function (arg1, callback) {
    callback.pending();
  });
};
module.exports = searchButtonDefinitions;