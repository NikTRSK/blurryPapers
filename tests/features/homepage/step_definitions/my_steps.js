var myStepDefinitionsWrapper = function () {

    this.Given(/^The search bar is empty$/, function (callback) {
        callback.pending();
    });
};
module.exports = myStepDefinitionsWrapper;