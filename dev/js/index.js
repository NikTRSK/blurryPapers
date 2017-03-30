import React from "react";
import ReactDOM from "react-dom";
import ArticleItem from "../../dev/js/components/article-item.js";
import ArticleList from "../../dev/js/containers/article-list";

const app = document.getElementById('root');

ReactDOM.render(
	<div>
	<ArticleList/>
	</div>
	, app);