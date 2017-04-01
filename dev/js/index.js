import React from "react";
import ReactDOM from "react-dom";
import { Provider } from "react-redux"
import ArticleList from "../../dev/js/containers/article-list";
import { default as styles } from '../../dev/styles/style.sass';
import store from "./store"

const app = document.getElementById('root');

ReactDOM.render(<Provider store={store}>
	<ArticleList word="Hello"/>
</Provider>, app);