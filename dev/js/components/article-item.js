import React from 'react'
import * as ReactBootstrap from 'react-bootstrap'
import Highlight from 'react-highlighter'
import FileSaver from 'file-saver'
import axios from 'axios'
import { IndexLink } from 'react-router'
import '../../../dev/styles/article-item.sass'

export default class ArticleItem extends React.Component {
	constructor(props) {
		super(props)
		this.state = {
			showModal: false,
			showAbstract: false,
			showConfPapers: false,
			checked: false
		}
	}
	downloadHighlight(url, word) {
		let str = `\"${url}\"`;
		axios.get(`http://localhost:8888/Server.php?convertPDF=${str}&highlight=${word}`)
			.then((response) => {
				let link = document.createElement('a')
				link.href = response.data
				link.download = 'highlighted-article.pdf'
				link.dispatchEvent(new MouseEvent('click'))
			})
			.catch((err) => {
				console.log(err)
			})
	}
	// TODO: Switch "Smith" with author
	/*
	 this.props.addToHistory(author, 5);
	 this.props.generatePapers(author);
	 */
	authorRoute(author) {
		this.props.addToHistory(author, 10)
		this.props.generatePapers(author)
	}
	// TODO: Switch "Smith" with conference
	/*
	 this.props.addToHistory(conference, 5);
	 this.props.generatePapers(conference);
	 */
	conferenceRoute(conference) {
		console.log("CONF ROUTE");
		this.props.addToHistory(conference, 10)
		this.props.generatePapers(conference)
	}

	convertLink(localpath) {
		//https://s3-us-west-2.amazonaws.com/cs310/pdf197yhsafhnkas72/
		//https://s3-us-west-2.amazonaws.com/cs310/pdf197yhsafhnkas72/A+0.6+V%2C+1.5+GHz+84+Mb+SRAM+in+14+nm+FinFET+CMOS+Technology+With+Capacitive+Charge-Sharing+Write+Assist+Circuitry.pdf
		console.log(localpath);
		let pdf = localpath.replace("resource/", "");
		let pdf_aws = pdf.split(' ').join('+');
		return `https://s3-us-west-2.amazonaws.com/cs310/pdf197yhsafhnkas72/${pdf_aws}`;
	}

	render() {
		//let downloadLink = "https://depts.washington.edu/owrc/Handouts/What%20is%20an%20Academic%20Paper.pdf"
		const { authors, conference, title, doi, wordFrequency } = this.props.article
		const downloadLink = this.convertLink(this.props.article.downloadLink);
		const { conferencepapers } = this.props.conferenceData
		const { bibtex } = this.props.bibtexData.bibtex
		const { abstract } = this.props.abstractData.abstract
		const { word, uniqueID } = this.props
		const { showAbstract, showModal, checked, showConfPapers } = this.state
		const mappedAuthors = authors.map((author, i) =>
			<IndexLink to="/" id={`author-num-${i}`} key={i} onClick={this.authorRoute.bind(this, author)}>
				{!!i && ', '}
				{author}
			</IndexLink>
		)
		const mappedConferences = conference.map((conference, i) =>
			<a onClick={() => {
				this.props.fetchFromConference(conference);
				const showConfPapers = this.state.showConfPapers;
				this.setState({ showConfPapers: !showConfPapers })
			}}>
				{!!i && ', '}
				{conference}
			</a>
		)
		console.log(conferencepapers);
		let mappedConferencePapers = [];
		if (conferencepapers)
			mappedConferencePapers = conferencepapers.map((paper, i) => <li>{paper}</li>);

		return (
			<div className="container" id="article-container">

				{/* Conferences popup */}
				<div className="row">
					<div>
						<ReactBootstrap.Modal show={showConfPapers} onHide={() => {
							this.props.clearFromConference()
							this.setState({ showConfPapers: false })
						}}>
							<ReactBootstrap.Modal.Header closeButton>
								<ReactBootstrap.Modal.Title>Conference Papers</ReactBootstrap.Modal.Title>
							</ReactBootstrap.Modal.Header>
							<ReactBootstrap.Modal.Body>
								<ul id="conference-papers">{mappedConferencePapers}</ul>
							</ReactBootstrap.Modal.Body>
						</ReactBootstrap.Modal>
					</div>
				</div>

				{/* BibTeX popup */}
				<div className="row">
					<div>
						<ReactBootstrap.Modal show={showModal} onHide={() => {
							this.props.clearBibtex()
							this.setState({ showModal: false })
						}}>
							<ReactBootstrap.Modal.Header closeButton>
								<ReactBootstrap.Modal.Title>BibTeX</ReactBootstrap.Modal.Title>
							</ReactBootstrap.Modal.Header>
							<ReactBootstrap.Modal.Body>
								<pre id="bibtex-text" className="article-modal-pre">{bibtex}</pre>
							</ReactBootstrap.Modal.Body>
						</ReactBootstrap.Modal>
					</div>
				</div>

				{/* Absstract popup */}
				<div className="row">
					<div>
						<ReactBootstrap.Modal show={showAbstract} onHide={() => {
							this.props.clearAbstract()
							this.setState({ showAbstract: false })
						}}>
							<ReactBootstrap.Modal.Header closeButton>
								<ReactBootstrap.Modal.Title>Abstract</ReactBootstrap.Modal.Title>
							</ReactBootstrap.Modal.Header>
							<ReactBootstrap.Modal.Body>
								<pre id="abstract-text" className="article-modal-pre">
									<Highlight search={word} matchStyle={{ backgroundColor: '#ffd54f' }}>
										{abstract}
									</Highlight>
								</pre>
								<button className="btn btn-primary" id="highlight-dl-button" onClick={() => this.downloadHighlight(downloadLink, word)}>
									<span className="glyphicon glyphicon-download"></span> Download
								</button>
							</ReactBootstrap.Modal.Body>
						</ReactBootstrap.Modal>
					</div>
				</div>

				{/* Article Checkbox + Title */}
				<div className="row" id="article-title-container">
					<table>
						<tr>
							<th className="article-checkbox-col">
								<input type="checkbox" ref={doi} value={checked} id="article-checkbox" onChange={() => {
									const checked = this.state.checked
									this.setState({ checked: !checked })
									this.props.onChange(this.props.article.doi, !checked)
								}} />
							</th>
							<th className="article-title-col">
								<a onClick={() => {
									this.props.fetchAbstract(doi)
									this.setState({ showAbstract: true })
								}}>
									<p className="title-getter" id="article-title">{title}</p>
								</a>
							</th>
						</tr>
					</table>
				</div>

				{/* Word + Occurences */}
				<div className="row" id="article-authors-container">
					<span id="article-occurences-1">{word}: </span>
					<span id="article-occurences-2">Occurs </span>
					<span className="frequency-getter" id="article-occurences-1">{wordFrequency}</span>
					<span id="article-occurences-2"> times.</span>
				</div>

				{/* Article Authors */}
				<div className="row" className="authors-getter" id="article-authors-container">
					<span id="article-authors">Authors: </span>
					{mappedAuthors}
				</div>

				{/* Article Conferences */}
				<div className="row" className="conference-getter" id="article-authors-container">
					<span id="article-conferences">Conferences: </span>
					{mappedConferences}
				</div>

				{/* Buttons */}
				<div className="row" id="article-buttons-container">
					<button className="btn btn-primary" id="article-bibtex-button" onClick={() => {
						this.props.fetchBibtex(doi)
						this.setState({ showModal: true })
					}}>
						<span className="glyphicon glyphicon-book"></span> BibTeX
					</button>
					<a target="_blank" href={downloadLink}>
						<button className="btn btn-primary" id="article-dl-button">
							<span className="glyphicon glyphicon-download"></span> Download
						</button>
					</a>
				</div>
			</div>
		)
	}
}

ArticleItem.propTypes = {
	addToHistory: React.PropTypes.func,
	generatePapers: React.PropTypes.func,
	fetchAbstract: React.PropTypes.func,
	clearAbstract: React.PropTypes.func,
	fetchBibtex: React.PropTypes.func,
	onChange: React.PropTypes.func,
	clearBibtex: React.PropTypes.object,
	article: React.PropTypes.object,
	bibtexData: React.PropTypes.object,
	abstractData: React.PropTypes.object,
	word: React.PropTypes.string
}
