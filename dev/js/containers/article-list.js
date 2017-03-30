import React from 'react';
import ArticleItem from '../components/article-item';
import { default as styles } from '../../../dev/styles/article-list.sass';

export default class ArticleList extends React.Component {
	constructor() {
		super();
		this.state = {
			articles: [<ArticleItem/>,<ArticleItem/>,<ArticleItem/>],
			title: "Word"
		}
	}

	render() {
		const { articles, title } = this.state;
		return (
			<div className="container">

				{/*Word Title*/}
				<div className="row">
					<p id="article-list-title">{title}</p>
					<br/>
				</div>

				{/*Article List*/}
				<div className="row" id="article-container">
					<div className="col-lg-12">
						<ul>
							{articles}
						</ul>
					</div>
				</div>

				{/*Word CLoud Button*/}
				<div className="row" id="article-list-wordcloud-button-container">
					<div className="col-lg-12">
						<div id="form-id">
							<button className="btn btn-primary" id="al-wc-button" onClick={this.openBibtex}>
								<span className="glyphicon glyphicon-cloud"></span> ...... Generate Word Cloud From Selected Articles ......
							</button>
						</div>
					</div>
				</div>

				{/*Download Buttons for List*/}
				<div className="row" id="article-list-download-buttons-container">
					<div className="col-lg-12">
						<div id="form-id">
							<button className="btn btn-primary" id="al-pdf-button" onClick={this.openBibtex}>
								<span className="glyphicon glyphicon-download"></span> Download List as PDF
							</button>
							<button className="btn btn-primary" id="al-txt-button">
								<span className="glyphicon glyphicon-download"></span> Download List as TXT
							</button>
						</div>
					</div>
				</div>

			</div>
		)
	}
}