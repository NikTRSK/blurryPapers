const expect = require('chai').expect;

const seleniumTests = function () {

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

    // this.When(/^The "([^"]*)" is empty$/, (element) => {
    //     expect($(element).getValue()).to.be.empty;
    // });

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
        browser.pause(3000);
        let wordcloud = $(element);
        expect(wordcloud.state).to.equal("failure");
    });

    this.When(/^There is a wordcloud$/, function (callback) {
        // browser.pause(5000);
        let inputBox = $("#search-input-box");
        inputBox.setValue("Smith");

        let searchBtn = $("#search-button");
        searchBtn.click();
        //expect(wordCloud.state).to.equal("success");
    });

    this.Then(/^There is a "([^"]*)"$/, (element) => {
        //let inputBox = $("#search-input-box");
        let inputBox = $("#search-input-box");
        inputBox.setValue("Smith");

        let searchBtn = $("#search-button");
        searchBtn.click();
        // expect(wordCloud.state).to.equal("success");

    });

    //download_image_button.feature
    this.When(/^The "([^"]*)" is clicked$/, function (element, callback) { //when the search button is clicked
        let myButton = $(element);
        myButton.click();
    });

    //click on the word from WC
    this.When(/^I select a "([^"]*)" from the "([^"]*)"$/, function (element1, element2) {
        browser.pause(7000);
        let cloudItems = $$(".tag-cloud-tag");


        for (let i = 0; i < cloudItems.length; ++i) {
            if (cloudItems[i].getText() === "present") { //selected a word to be clicked
                cloudItems[i].click();
                break;
            }
        }
    });

    this.Then(/^I expect to see a "([^"]*)" download button with the text "([^"]*)"$/,(element, text)=> {
        let btnDiv = $$("articles-dl-button-div");
        for (let i = 0; i < btnDiv.length; ++i) {
            if (btnDiv[i].getText() === "Download List as TXT") {
                break;
            }
        }
    });

    this.Then(/^I expect to see a "([^"]*)" button to download with the text "([^"]*)"$/,(element, text) => {
        let btnDiv = $$("articles-dl-button-div");
        for (let i = 0; i < btnDiv.length; ++i) {
            if (btnDiv[i].getText() === "Download List as PDF") {
                break;
            }
        }
    });

    // title.feature
    this.Then(/^I expect "([^"]*)" to be the selected word from "([^"]*)"$/, (element, word) => {
        let title = $$("articles-title-div");
        for (let i = 0; i < title.length; ++i) {
            if (title[i].getText() === "present") {
                break;
            }
        }
    });

    //selection.feature
    this.Then(/^I expect to see a "([^"]*)" within a "([^"]*)"$/, (arg1, arg2) => { //check for checkbox
        let articleDiv = $$("articles-article-list-div");
        let noElements = "True";
        for (let i = 0; i < articleDiv.length; ++i) {
            if (articleDiv[i].getText() === "article-checkbox") {
                noElements = "False";
            }
        }
        if(noElements === "False"){
            return;
        }
    });

    //ui.feature
    this.Then(/^I expect a list of Articles to display under the title$/,(element, text)=> {
        let articleDiv = $$("articles-article-list-div");
        let noElements = "True";
        for (let i = 0; i < articleDiv.length; ++i) {
            if (articleDiv[i].getText() === "article-container") {
                noElements = "False";
            }
        }
        if(noElements === "False"){
            return;
        }
    });

    this.Then(/^I expect the article component to list the authors$/,(element, text)=> {
        let articleDiv = $$("articles-article-list-div");
        let noElements = "True";
        for (let i = 0; i < articleDiv.length; ++i) {
            if (articleDiv[i].getText() === "article-authors-container") { //searching for authors
                noElements = "False";
            }
        }
        if(noElements === "False"){
            return;
        }
    });

    this.Then(/^I expect to see a button allowing me to view the BibTeX$/,(element, text)=> {
        let outsideDiv = $("article-buttons-container");
        let noElements = "True";
        for (let i = 0; i < outsideDiv.length; ++i) {
            if (outsideDiv[i].getText() === "article-bibtex-button") { //searching for authors
                noElements = "False";
            }
        }
        if(noElements === "False"){
            return;
        }
    });

    this.When(/^I click on the Download button$/, (element) =>{
        let outsideDiv = $("article-buttons-container");
        let noElements = "True";
        for (let i = 0; i < outsideDiv.length; ++i) {
            if (outsideDiv[i].getText() === "article-download-button") { //searching for authors
                // outsideDiv[i].click();
                noElements = "False";
            }
        }
        if(noElements === "False"){
            return;
        }
    });

    this.Then(/^I expect a tab to pop up$/,(element, text)=> {
        // expect(null).to.not.equal(null); // TODO
    });

    /* New stuff */
  // download_button
  this.Then(/^I expect a download button "([^"]*)" with the text "([^"]*)" to not exist$/, (element, word) => {
    let downloadBtn = $(element);
    expect(downloadBtn.state).to.equal("failure");
  });
  this.Then(/^I expect a download button "([^"]*)" with the text "([^"]*)" to exist$/, (element, word) => {
    browser.pause(5500);
    let downloadBtn = $(element);
    expect(downloadBtn.state).to.equal("success");
    expect(downloadBtn.getText()).to.equal(word);
  });

  this.Then(/^Clicking the "([^"]*)" opens a download link$/, (element) => {
    browser.pause(7000);
    let downloadBtn = $(element);
    downloadBtn.click();
    expect(downloadBtn.state).to.equal("success");
  });

  // history
  this.Then(/^I expect a "([^"]*)" with the history$/, (element) => {
    history = $(element);
    expect(history.state).to.eq('success');
  });

  this.When(/^I click on a search history item$/, () => {
    let historyItems = $$("#search-history-item");

    for (let i = 0; i < historyItems.length; ++i) {
      if (historyItems[i].getText() === "Smith") {
        historyItems[i].click;
        break;
      }
    }
  });

  this.Then(/^The word cloud is regenerated$/, (element) => {
    browser.pause(7000);
    let wordCloud = $("#word-cloud");
    expect(wordCloud.state).to.equal("success");
  });

  // progress bar
  this.When(/^The search bar is empty$/,  (element) => {
    expect(null).to.not.equal(null); // TODO
  });

  this.Then(/^There isn't a "([^"]*)"$/, (element) => {
    expect($(element).state).to.equal("failure");
  });

  this.Then(/^I expect a progress bar "([^"]*)" to show me the progress$/, (element) => {
    expect($(element).getCssProperty('opacity').value).to.equal(1);
  });

  // num items box
  this.Then(/^I expect there to be a "([^"]*)" for the number of items$/, (element) => {
    expect($(element).state).to.equal("success");
  });

  this.When(/^I enter nothing in the number of items box "([^"]*)"$/, (element) => {
    $(element).setValue("");
  });

  this.Then(/^The number items box "([^"]*)" is empty$/, (element) => {
    expect($(element).getValue()).to.equal("");
  });

  this.When(/^I enter "([^"]*)" in the number of items box "([^"]*)"$/, (count, element) => {
    $(element).setValue(count);
  });

  this.Then(/^I expect the number of items box "([^"]*)" to show "([^"]*)"$/, (element, count) => {
    expect($(element).getValue()).to.equal(count);
  });


  //view_abstract.feature
    this.When(/^I click on the article title$/, () => {
       browser.pause(7000);
        let title = $("#articles-title");
       if(title.getText() === "present"){
           title.click();
       }

    });
    this.Then(/^I expect to see a popup containing the abstract$/, (element) => {
       expect(null).to.equal(null));
    });

    //author_list.feature
    this.When(/^I click on the author$/, function (arg1, callback) { //Click on the option from the dropdown menu
        //div = #article-authors-container
        expect((null).to.not.equal(null)); //placeholder to create later
    });

    //sort_by_button.feature
        //the "The "dropdown btn-group" is clicked" calls on a previous one
    this.When(/^I click on the "([^"]*)" option$/, function (arg1, callback) { //Click on the option from the dropdown menu
        expect((null).to.not.equal(null)); //placeholder to create later
    });
        //sort by title
    this.Then(/^I should see the articles to be sorted alphabetically by title$/, (element) => {
        expect((null).to.not.equal(null)); //placeholder to create later
    });
        //sort by author name
    this.Then(/^I should see the articles to be sorted sorted by Author name$/, (element) => {
        expect((null).to.not.equal(null)); //placeholder to create later
    });
        //sort by number of occurrences
    this.Then(/^I should see the articles to be sorted by number of occurences$/, (element) => {
        expect((null).to.not.equal(null)); //placeholder to create later
    });
        //sort by conference
    this.Then(/^I should see the articles to be sorted by the names of Conferences$/, (element) => {
        expect((null).to.not.equal(null)); //placeholder to create later
    });

    //generate_new_wc.feature
    this.When(/^I click on "([^"]*)"$/, function (arg1, callback) { //Click on regenerate a new WC from articles
        expect((null).to.not.equal(null)); //placeholder to create later
    });
    this.Then(/^I should see a new Word Cloud$/, (element) => {
        expect((null).to.not.equal(null)); //placeholder to create later
    });

    //conference_list.feature
    this.When(/^I click on a conference name$/, function (arg1, callback) { //Click on regenerate a new WC from articles
        expect((null).to.not.equal(null)); //placeholder to create later
    });
        //Then I should see a new Word Cloud

    //bibtex_button.feature
        //calls on the "I click on from sort_by_button.feature
    this.Then(/^I should be able to see a popup with the bibtex$/, (element) => {
        expect((null).to.not.equal(null)); //placeholder to create later
    });
};

module.exports = seleniumTests;