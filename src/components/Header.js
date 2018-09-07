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

export class Nav extends Component {
  animateNav() {
    var tl = new TimelineLite();
    tl.from('.App-logo', 1.5, { opacity: 0, force3D: true }, 0.5);
    tl.staggerFrom('.navAnimate', 0.5, { opacity: 0, right: 30, delay: 0, force3D: true }, '-0.5');
  }
  componentDidMount() {
    //this.animateNav();
  }
  testTest() {
    alert('test');
  }
  smothScroll(e) {
    e.preventDefault();
    document.querySelector(e.target.hash).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  }
  state = {
    id: []
  };
  render() {
    return (
      <React.Fragment>
        <a href="#about" id="top" onClick={(e) => this.smothScroll(e)} className="navAnimate" title="Info about me">
          About
        </a>
        <a href="#portfolio" onClick={(e) => this.smothScroll(e)} className="navAnimate" title="My portfolio">
          Portfolio
        </a>
        <a href="#contacts" onClick={(e) => this.smothScroll(e)} className="navAnimate" title="My contacts">
          Contacts
        </a>
      </React.Fragment>
    );
  }
}

export default Header;
