import React, { Component } from 'react';
import * as ScrollMagic from 'scrollmagic';
import { gsap, TimelineMax, TweenMax } from 'gsap';

class Portfolio extends Component {
  componentDidMount() {
    const controller = new ScrollMagic.Controller();
    var scene = new ScrollMagic.Scene({
      triggerElement: '#portfolio' // starting scene, when reaching this element
      //duration: 100 // pin the element for a total of 400px
    }).setClassToggle('#test', 'newclass'); // the element we want to pin
    //scene.addIndicators();
    // Add Scene to ScrollMagic Controller
    controller.addScene(scene);
  }
  render() {
    return (
      <section className="portfolio" id="portfolio">
        <div className="container">
          <div className="intro">
            <h2 id="test">My Latest Work</h2>
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
