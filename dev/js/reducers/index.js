import { combineReducers } from 'redux'
import { routerReducer } from 'react-router-redux'

import paperData from './reducer-wordcloud';

const rootReducer = combineReducers({
  routing: routerReducer,
  paperData
});

export default rootReducer
