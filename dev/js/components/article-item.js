import React from 'react';
import { default as styles } from '../../../dev/styles/article-item.sass';
import * as ReactBootstrap from 'react-bootstrap'

export default class ArticleItem extends React.Component {
	constructor() {
    super();
    this.state = {
      showModal: false,
      bibtex:  
`@articleCandes:2011:RPC:1970392.1970395,
author = Cand\es, Emmanuel J. and Li, Xiaodong and Ma, Yi and Wright, John,
title = Robust Principal Component Analysis?,
journal = J. ACM,
issue_date = May 2011,
volume = 58,
number = 3,
month = un,
year = 2011,
issn = 0004-5411,
pages = 11:1--11:37,
articleno = 11,
numpages = 37,
url = http://doi.acm.org/10.1145/1970392.1970395,
doi = 10.1145/1970392.1970395,
acmid = 1970395,
publisher = ACM,
address = New York, NY, USA,`
    };
    this.openBibtex = this.openBibtex.bind(this);
    this.closeBibtex = this.closeBibtex.bind(this);
  }
  getInitialState() {
    return { showModal: false };
  }
  closeBibtex() {
    this.setState({ showModal: false });
  }
  openBibtex() {
    this.setState({ showModal: true });
  }
	render() {
		return (
      <div className="container">
				<div className="whole-container">
      	
      		{/* BibTeX popup */}
      		<div className="row">
			      <div>
			        <ReactBootstrap.Modal show={this.state.showModal} onHide={this.closeBibtex}>
			          <ReactBootstrap.Modal.Header closeButton className="bibtex-header">
			            <ReactBootstrap.Modal.Title>BibTeX</ReactBootstrap.Modal.Title>
			          </ReactBootstrap.Modal.Header>
			          <ReactBootstrap.Modal.Body className="bibtex-body">
			            <pre >{this.state.bibtex}
			            </pre>
			          </ReactBootstrap.Modal.Body>
			        </ReactBootstrap.Modal>
			      </div>
      		</div>

      		{/* Article Checkbox */}
					<div className="row">
						<div className="col-lg-12" id="checkbox-div">
						  <form>
						      <input type="checkbox" value="" id="checkbox-item"/>
						  </form>
							<p id="title-text">Robust principal component analysis?</p>
						</div>
					</div>

      		{/* Article Title */}
					<div className="row">
						<div className="col-lg-12">
							<div className="author-container">
								<p className="author-list"><a href="#">Emmanuel J. Candès</a>, <a href="#">Xiaodong Li</a>, <a href="#">Yi Ma</a>, <a href="#">John Wright</a></p>
							</div>
						</div>	
					</div>

      		{/* Buttons */}
					<div className="row">
						<div className="col-lg-12">
			        <div className= "container" id="button-container">
			        	<div id="form-id">
			                <button className="btn btn-primary" id="bibtex-button" onClick={this.openBibtex}>
			  								<span className="glyphicon glyphicon-book"></span> BibTeX
			                </button>
			                <button className="btn btn-primary" id="bibtex-button">
			  								<span className="glyphicon glyphicon-download"></span> Download
			                </button>
								</div>
			        </div>
						</div>	
					</div>

				</div>
			</div>
		);
	}
}