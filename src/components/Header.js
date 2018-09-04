import React, { Component } from 'react';
import logo from '../img/logo.png';
import { TimelineLite } from 'gsap/TweenMax';

class Header extends Component {
  componentDidMount() {}
  render() {
    return (
      <header className="header">
        <div className="container">
          <img src={logo} className="App-logo" alt="logo" />
          <nav>
            <Nav />
          </nav>
        </div>
      </header>
    );
  }
}

class Nav extends Component {
  animateNav() {
    var tl = new TimelineLite();
    tl.from('.App-logo', 1.5, { opacity: 0, force3D: true }, 0.5);
    tl.staggerFrom('.navAnimate', 0.5, { opacity: 0, right: 30, delay: 0, force3D: true }, '-0.5');
  }
  componentDidMount() {
    this.animateNav();
  }
  state = {
    id: []
  };
  render() {
    return (
      <React.Fragment>
        <a href="#about" className="navAnimate">
          About
        </a>
        <a href="#portfolio" className="navAnimate">
          Portfolio
        </a>
        <a href="#contacts" className="navAnimate">
          Contacts
        </a>
      </React.Fragment>
    );
  }
}

export default Header;
