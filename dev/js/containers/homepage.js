import React, {Component} from 'react';
import '../../styles/homepage.sass'
import WordCloud from './word-cloud';

const homepage = React.createClass ({
  render() {

    return (
      <div className="input-group center">
        <WordCloud {...this.props} />
        <input id="search-input-box" type="text" className="form-control searchBox"
               value=""
               placeholder="Search artists..."
        >
        </input>

        <button id="search-button" className="btn btn-lg searchButton">
              <span className="glyphicon glyphicon-search" aria-hidden="true">
              </span> Search
        </button>
      </div>
    );
  }
});

export default homepage;
