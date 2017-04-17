import axios from "axios";
import { showLoading } from 'react-redux-loading-bar'

export const generatePapers = (query, count) => {
  const request = axios.get("http://localhost:8888/Server.php?query=" + query + "&paperCount="+count);
  return (dispatch) => {
    dispatch(showLoading());
    request
      .then((response) => {
        console.log("GENERATE_PAPERS_ACTION_FUNCTION")
        console.log(response)
        dispatch({type: "GENERATE_WORDCLOUD_FULFILLED", payload: response.data})
      })
      .catch((err) => {
        console.log("GENERATE_PAPERS_ACTION_FUNCTION_ERR")
        console.log(err)
        dispatch({type: "GENERATE_WORDCLOUD_REJECTED", payload: err})
      })
  };
};

export function fetchArticles(word) {
  return function(dispatch) {
    axios.get(`http://localhost:8888/Server.php?word=${word}`)
      .then((response) => {
        console.log(response.data)
        dispatch({type: "ARTICLES_RECEIVED", payload: response.data})
      })
      .catch((err) => {
        dispatch({type: "ARTICLES_REJECTED", payload: err})
      })
  }
}

export function clearArticles() {
  return function(dispatch) {
    dispatch({type: "ARTICLES_CLEAR", payload: []})
  }
}

export function fetchBibtex() {
  return function(dispatch) {
    axios.get("http://localhost:8888/bibtex")
      .then((response) => {
        dispatch({type: "BIBTEX_RECEIVED", payload: response.data})
      })
      .catch((err) => {
        dispatch({type: "BIBTEX_REJECTED", payload: err})
      })
  }
}

export function clearBibtex() {
  return function(dispatch) {
    dispatch({type: "BIBTEX_CLEAR", payload: {bibtex:""}})
  }
}

export function fetchAbstract() {
  return function(dispatch) {
    axios.get("http://localhost:8888/abstract")
      .then((response) => {
        dispatch({type: "ABSTRACT_RECEIVED", payload: response.data})
      })
      .catch((err) => {
        dispatch({type: "ABSTRACT_REJECTED", payload: err})
      })
  }
}

export function clearAbstract() {
  return function(dispatch) {
    dispatch({type: "ABSTRACT_CLEAR", payload: {abstract:""}})
  }
}

export function addToHistory(query, count) {
  console.log("Adding to history");
  return {
    type: 'APPEND_HISTORY',
    query,
    count
  }
}