import { TagCloud } from "react-tagcloud";
import React, {Component} from 'react';
import {bindActionCreators} from 'redux';
import {connect} from 'react-redux';
import {selectUser} from '../actions/index'

class WordCloud extends React.Component {
  constructor() {
    super();
    // super();
    // this.getData = this.getData.bind(this);
    //
    // this.updateColor = this.updateColor.bind(this);
  }
  // Updates our components state variables by grabbing the stores
  // current version of our state
  // getData() {
  //   this.setState({
  //     wordData: WordCloudStore.getAllWordData(),
  //     artistData: WordCloudStore.getAllArtistData(),
  //     inputData: WordCloudStore.getAllInputData(),
  //   });
  // }
  // Render method that contains all of our html
  render() {
    return (
      <div>

        <div id="myModal" className="modal" ref="myModal">
          <div className="modal-content">
            <div className="modal-header">
              <span className="close" id="closeModal" ref="closeModal" onClick={()=>this.closePopUp()}>×</span>
            </div>
          </div>
        </div>

        <div className="word-cloud" id="currentCloud" ref="currentCloud">
          <TagCloud minSize={8}
                    maxSize={90}
                    tags={this.props.worddata}
          />
        </div>
      </div>
    );
  }
}

// Get apps state and pass it as props to UserList
// > whenever state changes, the WordCloud will automatically re-render
function mapStateToProps(state) {
  return {
    worddata: state.wordclouddata
  };
}

// Get actions and pass them as props to to UserList
//      > now UserList has this.props.selectUser
// function matchDispatchToProps(dispatch){
//   return bindActionCreators({selectUser: selectUser}, dispatch);
// }

// We don't want to return the plain UserList (component) anymore, we want to return the smart Container
//      > UserList is now aware of state and actions
export default connect(mapStateToProps/*, matchDispatchToProps*/)(WordCloud);
