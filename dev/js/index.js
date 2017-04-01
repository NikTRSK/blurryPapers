import React from "react";
import ReactDOM from "react-dom";
import ArticleItem from "../../dev/js/components/article-item.js";
import ArticleList from "../../dev/js/containers/article-list";
import { default as styles } from '../../dev/styles/style.sass';


const app = document.getElementById('root');

ReactDOM.render(
	<div id="main-container">
	<ArticleList/>
	</div>
	, app);