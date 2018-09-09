import React, { Component } from 'react';
import { TimelineLite } from 'gsap/TweenMax';
//import * as ScrollMagic from 'scrollmagic';
//import { gsap, TimelineMax, TweenMax } from 'gsap';
const ScrollMagic = require('ScrollMagic');
const TweenMax = require('TweenMax');
require('ScrollMagicIndicators');
require('AnimationGsap');
//https://www.iconfinder.com/icons/1214978/mouse_scroll_icon
class Portfolio extends Component {
  constructor(props) {
    super(props);
    this.state = { itemHeader: [ 'First header', 'dadsf' ] };
  }
  componentDidMount() {
    const controller = new ScrollMagic.Controller();
    //const tween = TweenMax.from('.my-work-header', 1, { x: -100, opacity: 0 });
    new ScrollMagic.Scene({
      triggerElement: '#portfolio',
      duration: 0
    })
      //.setTween(tween)
      .setClassToggle('.intro', 'show-text')
      .addIndicators({ name: 'My Latest Work' })
      .addTo(controller);
  }
  render() {
    return (
      <section className="portfolio" id="portfolio">
        <div className="container">
          <div className="intro">
            <div className="text-hide">
              <h2 className="my-work-header">My Latest Work</h2>
            </div>
            <div className="text-hide">
              <h3 className="my-work-header">Take a look at some of my recent projects.</h3>
            </div>
          </div>
          <Works header={this.state.itemHeader} />
        </div>
      </section>
    );
  }
}
class Works extends Component {
  componentDidMount() {
    this.pulseClick();
  }
  animateItem(event) {
    event.currentTarget.querySelector('.product-item__hidden-window').classList.add('product-item__show');
    let thisTitles = event.currentTarget.querySelectorAll('.product-item__hidden-window .title');
    let tlItem = new TimelineLite();
    tlItem
      .staggerFrom(thisTitles, 0.2, { opacity: 0, y: -50, delay: 0.5, force3D: true }, '-0.2')
      .staggerTo(thisTitles, 0.2, { y: 10, delay: 0.5, force3D: true }, '+0.2');
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
      e.currentTarget.parentNode.querySelector('.first-description').classList.add('first-description__full');
      setTimeout(function() {
        addDiv.remove();
      }, 1000);
    }
  }
  render() {
    const header = this.props.header;
    // const titleItems = () => {
    //   <div className="title">{this.props.header}</div>;
    // };
    var titleItems = header.map(function(one) {
      return <div className="title">{one}</div>;
    });
    return (
      <section className="product-wrapper">
        <div
          className="product-item animate"
          onMouseEnter={(event) => this.animateItem(event)}
          onMouseLeave={this.stopAnimate}
        >
          <div className="product-item__hidden-window">{titleItems}</div>
          <div className="first-description">
            <div className="header">{this.props.header}</div>
            <div className="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, labore.</div>
            <i onClick={this.pulseClick} />
          </div>
          <div className="full-description" />
        </div>
      </section>
    );
  }
}

export default Portfolio;
