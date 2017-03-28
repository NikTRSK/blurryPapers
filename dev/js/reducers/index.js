import {combineReducers} from 'redux';
import WordCloudReducer from './reducer-wordcloud';
import HistoryReducer from './reducer-history';

/*
 * We combine all reducers into a single object before updated data is dispatched (sent) to store
 * Your entire applications state (store) is just whatever gets returned from all your reducers
 * */

const allReducers = combineReducers({
  users: WordCloudReducer,
  activeUser: HistoryReducer
});

export default allReducers
