import React, { Component } from 'react';
import { TimelineLite } from 'gsap/TweenMax';
//import * as ScrollMagic from 'scrollmagic';
//import { gsap, TimelineMax, TweenMax } from 'gsap';
const ScrollMagic = require('ScrollMagic');
//require('TimelineMax');
// require('TweenLite');
const TweenMax = require('TweenMax');
require('ScrollMagicIndicators');
require('AnimationGsap');
// require('GSAPEase');
// require('GSAPEasePlagin');

class Portfolio extends Component {
  componentDidMount() {
    const controller = new ScrollMagic.Controller();
    const tween = TweenMax.from('.my-work-header', 1, { x: -100, opacity: 0 });
    new ScrollMagic.Scene({
      triggerElement: '#portfolio',
      duration: 0,
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
            <h2 className="my-work-header">My Latest Work</h2>
            <h3 className="my-work-header">Take a look at some of my recent projects.</h3>
          </div>
          <Works />
        </div>
      </section>
    );
  }
}

export default Portfolio;

class Works extends Component {
  componentDidMount() {
    this.pulseClick();
  }
  animateItem(event) {
    event.currentTarget.querySelector('.product-item__hidden-window').classList.add('product-item__show');
    let thisTitles = event.currentTarget.querySelector('.product-item__hidden-window .title');
    //console.log(object);
    let tlItem = new TimelineLite();
    tlItem
      .staggerFrom('.title', 0.5, { opacity: 0, y: -50, delay: 0.5, force3D: true }, '-0.5')
      .staggerTo('.title', 0.5, { y: 20, delay: 0.5, force3D: true }, '+0.5');
  }
  stopAnimate(event) {
    event.currentTarget.querySelector('.product-item__hidden-window').classList.remove('product-item__show');
    let tlItem = new TimelineLite();
    tlItem.staggerTo('.title', 0, { y: 0, delay: 0, opacity: 1, force3D: true }, 0);
  }
  pulseClick(e) {
    var item = document.getElementsByClassName('product-item__hidden-window'),
      forEach = Array.prototype.forEach;
    forEach.call(item, function(b) {
      b.addEventListener('click', addElement);
    });
    function addElement(e) {
      console.log(e.currentTarget);
      let sDiv;
      let px;
      var addDiv = document.createElement('div'),
        mValue = Math.max(this.clientWidth, this.clientHeight),
        rect = this.getBoundingClientRect();
      sDiv = addDiv.style;
      px = 'px';
      sDiv.width = sDiv.height = mValue + px;
      sDiv.left = e.clientX - rect.left - mValue / 2 + px;
      sDiv.top = e.clientY - rect.top - mValue / 2 + px;
      addDiv.classList.add('pulse');
      this.appendChild(addDiv);
      //e.currentTarget.querySelector('.first-description').classList.add('first-description__full');
      setTimeout(function() {
        addDiv.remove();
      }, 1000);
    }
  }
  render() {
    return (
      <section className="product-wrapper">
        <div className="product-item" onMouseEnter={(event) => this.animateItem(event)} onMouseLeave={this.stopAnimate}>
          <div className="product-item__hidden-window">
            <div className="title">html</div>
            <div className="title">css</div>
            <div className="title">js</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
          </div>
          <div className="first-description">
            <div className="header">Header</div>
            <div className="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, labore.</div>
            <i onClick={this.pulseClick} />
          </div>

          <div className="full-description" />
        </div>
        <div className="product-item" onMouseEnter={(event) => this.animateItem(event)} onMouseLeave={this.stopAnimate}>
          <div className="product-item__hidden-window">
            <div className="title">html</div>
            <div className="title">css</div>
            <div className="title">js</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
            <div className="title">jquery</div>
          </div>
          <div className="first-description">
            <div className="header">Header</div>
            <div className="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, labore.</div>
            <i onClick={this.pulseClick} />
          </div>

          <div className="full-description" />
        </div>
      </section>
    );
  }
}
