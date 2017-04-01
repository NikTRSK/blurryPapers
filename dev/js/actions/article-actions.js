import axios from "axios";
import articleData from "../data/articleData";

export function fetchArticles() {
	return {
		type: "FETCH_ARTICLES",
		payload: articleData.articles
	}
}