import React, { Component } from 'react';
//import * as ScrollMagic from 'scrollmagic';
//import { gsap, TimelineMax, TweenMax } from 'gsap';
const ScrollMagic = require('ScrollMagic');
// require('TimelineMax');
// require('TweenLite');
const TweenMax = require('TweenMax');
require('ScrollMagicIndicators');
require('AnimationGsap');
// require('GSAPEase');
// require('GSAPEasePlagin');

class Portfolio extends Component {
  componentDidMount() {
    const controller = new ScrollMagic.Controller();
    // var scene = new ScrollMagic.Scene({
    //   triggerElement: '#portfolio', // starting scene, when reaching this element
    //   duration: 100 // pin the element for a total of 400px
    // }).setTween('#test', 0.5, { color: 'green', scale: 2.5 }); // the element we want to pin
    // scene.addIndicators();
    // // Add Scene to ScrollMagic Controller
    // controller.addScene(scene);
    /*2*/
    const tween = TweenMax.from('#my-work-header', 1, { x: -100, opacity: 0 });
    new ScrollMagic.Scene({
      triggerElement: '#portfolio',
      duration: '30%',
      reverse: false
    })
      .setTween(tween)
      .addIndicators({ name: 'My Latest Work' })
      .addTo(controller);
  }
  render() {
    return (
      <section className="portfolio" id="portfolio">
        <div className="container">
          <div className="intro">
            <h2 id="my-work-header">My Latest Work</h2>
            <h3>Take a look at some of my recent projects.</h3>
          </div>
        </div>
      </section>
    );
  }
}

export default Portfolio;

// class Works extends Component {
//   render() {
//     return (
//       <section className="portfolio" id="portfolio">
//         <div className="container" />
//       </section>
//     );
//   }
// }
