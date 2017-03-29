import React from "react";
import { default as styles } from '../../../dev/styles/article-item.sass';

export default class ArticleItem extends React.Component {
	render() {
		return (
      <div className="container">
      	<div className="whole-container">

					<div className="row">
						<div className="col-lg-12" id="checkbox-div">
						  <form>
						      <input type="checkbox" value="" id="checkbox-item"/>
						  </form>
							<p id="title-text">Robust principal component analysis?</p>
						</div>
					</div>

					<div className="row">
						<div className="col-lg-12">
							<div className="author-container">
								<p className="author-list"><a href="#">Emmanuel J. Candès</a>, <a href="#">Xiaodong Li</a>, <a href="#">Yi Ma</a>, <a href="#">John Wright</a></p>
							</div>
						</div>	
					</div>

					<div className="row">
						<div className="col-lg-12">
			        <div className= "container" id="button-container">
			            <form id="form-id">
			                <button className="btn btn-primary" id="bibtex-button">
			  								<span className="glyphicon glyphicon-book"></span> BibTeX
			                </button>
			                <button className="btn btn-primary" id="bibtex-button">
			  								<span className="glyphicon glyphicon-download"></span> Download
			                </button>
			            </form>
			        </div>
						</div>	
					</div>
				</div>
			</div>
		);
	}
}