import axios from "axios";
import articleData from "../data/articleData";

export function generatePapers(query) {
  console.log("Querying API");
  return {
    type: 'GENERATE_WORDCLOUD',
    query
  }
}

export function getPapers(word, count) {
  console.log("GETTING PAPERS: " + word + ", " + count);
  return {
    type: 'GET_PAPERS',
    word,
    count
  }
}

export function fetchArticles() {
  return function(dispatch) {
    axios.get("http://localhost:8888/articles")
      .then((response) => {
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

export function addToHistory(query, count) {
  console.log("Adding to history");
  return {
    type: 'APPEND_HISTORY',
    query,
    count
  }
}