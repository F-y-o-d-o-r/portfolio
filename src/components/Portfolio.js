import React, { Component } from 'react';
import ScrollMagic from 'scrollmagic';

class Portfolio extends Component {
  render() {
    return (
      <section className="portfolio" id="portfolio">
        <div className="container">
          <div className="intro">
            <h2>My Latest Work</h2>
            <h3>Take a look at some of my recent projects.</h3>
          </div>
        </div>
      </section>
    );
  }
}

export default Portfolio;

class Works extends Component {
  render() {
    return (
      <section className="portfolio" id="portfolio">
        <div className="container" />
      </section>
    );
  }
}
