import axios from "axios";
import articleData from "../data/articleData";

export function fetchArticles() {
	return {
		type: "FETCH_ARTICLES",
		payload: articleData.articles
	}
}

export function fetchBibtex() {
	return function(dispatch) {
	axios.get("http://localhost:8888/bibtex")
		.then((response) => {
			dispatch({type: "BIBTEX_RECEIVED", payload: response.data})
		})
		.catch((err) => {
			dispatch({type: "FETCH_TWEETS_REJECTED", payload: err})
		})
	}
}