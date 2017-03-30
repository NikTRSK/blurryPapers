import React from 'react';
import {Router, Route} from 'react-router';
import Homepage from '../containers/homepage';
import Paperlist from '../containers/paper-list';
// import App from '../components/App';
import createBrowserHistory from 'history/createBrowserHistory';

const browserHistory = createBrowserHistory();

export default (
  <Router history={browserHistory}>
    <Route component={Homepage}>
      <Route path="/" component={Homepage} />
      <Route path="/paperlist" component={Paperlist} />
    </Route>
  </Router>
);