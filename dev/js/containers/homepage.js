import React from 'react';
import '../../styles/homepage.sass';
import WordCloud from './word-cloud';
import Logo from '../components/logo';

const homepage = () => (
  <div className="input-group center">
    <Logo/>
    <WordCloud/>
    <input id="search-input-box" type="text" className="form-control searchBox"
           value=""
           placeholder="Search artists..."
    >
    </input>

    <button id="search-button" className="btn btn-lg searchButton" >
					<span className="glyphicon glyphicon-search" aria-hidden="true">
					</span>  Search
    </button>
  </div>
);

export default homepage;