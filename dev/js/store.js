import {createStore, compose} from 'redux';
import {syncHistoryWithStore} from 'react-router-redux';
import createBrowserHistory from 'history/createBrowserHistory';

// import the root reducer
import rootReducer from './reducers/index';

import cloudData from './data/cloudData';

// create an object for the default data
const defaultState = {cloudData};

const store = createStore(rootReducer, defaultState);

const browserHistory = createBrowserHistory();

export const history = syncHistoryWithStore(browserHistory, store);

export default store;