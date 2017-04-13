import React, {Component} from 'react';
import '../../styles/homepage.sass'
import WordCloud from './word-cloud';
import SearchHistory from './search-history';
import LoadingBar from 'react-redux-loading-bar'

const homepage = React.createClass ({
  handleSubmit(e) {
    e.preventDefault();
    const searchQuery = this.refs.query.value;
    const count = this.refs.numArticles.value;
    this.props.addToHistory(searchQuery, count);
    this.props.generatePapers(searchQuery);
  },
  render() {
    return (
      <div className="input-group center">
        <WordCloud ref="wordcloud" {...this.props} />
        <div className="input-group serchInput">
          <input id="search-input-box" type="text" className="form-control"
                 placeholder="Search artists..." ref="query"
          >
          </input>

          <input id="search-numitems-box" type="text" className="form-control"
                 placeholder="Count..." ref="numArticles"
          >
          </input>
        </div>
        <button id="search-button" className="btn btn-lg searchButton"
                onClick={this.handleSubmit}>
              <span className="glyphicon glyphicon-search" aria-hidden="true">
              </span> Search
        </button>
        <SearchHistory className="searchHistory" {...this.props}/>
      </div>
    );
  }
});

export default homepage;