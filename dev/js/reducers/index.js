import {combineReducers} from 'redux';
import WordCloudReducer from './reducer-wordcloud';
import HistoryReducer from './reducer-history';
// import {routerStateReducer} from 'redux-router';
// import 'react-router';
// import 'redux-router';
/*
 * We combine all reducers into a single object before updated data is dispatched (sent) to store
 * Your entire applications state (store) is just whatever gets returned from all your reducers
 * */

const allReducers = combineReducers({
  wordclouddata: WordCloudReducer,
  history: HistoryReducer,
  // router: routerStateReducer
});

export default allReducers
