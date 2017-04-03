/* eslint-disable no-unused-vars */
import React from 'react'
import { render } from 'react-dom'
import Homepage from './containers/homepage';
import WordCloud from './containers/word-cloud';
import Paperlist from './containers/paper-list';

// import css

// import components
import App from './components/App'

// import react router
import { Router, Route, IndexRoute } from 'react-router'

import { Provider } from 'react-redux'
import store, { history } from './store'

const router = (
  <Provider store={store}>
    <Router history={history}>
      <Route path="/" component={App}>
        <IndexRoute component={Homepage} />
        <Route path="paperlist/:word" component={Paperlist} />
      </Route>
    </Router>
  </Provider>
);

render(router, document.getElementById('root'));
