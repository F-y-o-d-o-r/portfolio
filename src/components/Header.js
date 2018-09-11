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
    tl
      .from('header', 1.5, { opacity: 0, force3D: true, y: -100 }, '+=0.5')
      .from('.App-logo', 1.5, { opacity: 0, force3D: true }, 0.5)
      .staggerFrom('.navAnimate', 0.5, { opacity: 0, right: 30, delay: 0, force3D: true }, -0.5)
      .from('.info h1', 0.5, { y: 100, opacity: 0 }, 3.5)
      .from('.info h2', 0.5, { y: 100, opacity: 0 }, '-=0.2')
      .from('.info .scroll-icon', 0.5, { y: 100, opacity: 0 }, '-=0.2');
  }
  componentDidMount() {
    this.animateNav();
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
