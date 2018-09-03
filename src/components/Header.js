import React, { Component } from 'react';
import logo from '../img/logo.png';

class Header extends Component {
  render() {
    return (
      <div className="header container">
        <img src={logo} className="App-logo" alt="logo" />
        <nav>
          <Nav />
        </nav>
      </div>
    );
  }
}

class Nav extends Component {
  state = {
    id: []
  };
  render() {
    return (
      <React.Fragment>
        <a href="#">link 1</a>
        <a href="#">link 1</a>
      </React.Fragment>
    );
  }
}

export default Header;
