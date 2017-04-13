import React, {Component} from 'react';

import '../../styles/search-history.sass';

const SearchHistoryItem = React.createClass ({
  handleClick(e, searchQuery, count) {
    e.preventDefault();
    // console.log("In search|"+"Word: " + searchQuery + ", Count: " + count);
    this.props.generatePapers(searchQuery);
    this.setState({showDownloadButton: true});
  },
  render() {
    const {query, count} = this.props;
    return (
      <div>
        <tbody>
          <td id="search-history-item" key={query+count} className="searchItem">
              <a onClick={(e) => this.handleClick(e, query, count)}>
                {query}
              </a>
          </td>
        </tbody>
      </div>
    );
  }
});

export default SearchHistoryItem;