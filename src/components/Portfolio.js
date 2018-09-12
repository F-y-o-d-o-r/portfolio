import React, { Component } from 'react';
import { TimelineLite } from 'gsap/TweenMax';
import portfolio from './portfolio.json';
import 'gsap';
import * as ScrollMagic from 'scrollmagic';
import close from '../img/close.svg';

// require('scrollmagic/scrollmagic/uncompressed/ScrollMagic.js');
// require('scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js');
// require('scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js');
class Portfolio extends Component {
  constructor(props) {
    super(props);
    this.state = portfolio;
    this.json = '';
  }
  componentDidMount() {
    //console.log(portfolio);
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
          <Works itemContent={this.state.items} />
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
    var item1 = Array.prototype.slice.call(document.getElementsByClassName('product-item__hidden-window')),
      itemOpenButt = Array.prototype.slice.call(document.getElementsByClassName('icon-open')),
      item = item1.concat(itemOpenButt),
      forEach = Array.prototype.forEach;
    forEach.call(item, function(b) {
      b.addEventListener('click', addElement);
    });
    function addElement(e) {
      //console.log(e.currentTarget);
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
      e.currentTarget
        .closest('.product-item')
        .querySelector('.full-description')
        .classList.add('show-description__full');
      e.currentTarget.closest('.product-item').classList.add('show-shadow');
      setTimeout(function() {
        addDiv.remove();
      }, 1000);
    }
  }
  closeItem(e) {
    e.currentTarget.closest('.full-description').classList.remove('show-description__full');
    e.currentTarget.parentNode.parentNode.classList.remove('show-shadow');
  }
  render() {
    const itemContent = this.props.itemContent;
    var item = itemContent.reverse().map((item, i, arr) => {
      return (
        <div
          className="product-item animate"
          onMouseEnter={(event) => this.animateItem(event)}
          onMouseLeave={this.stopAnimate}
          key={itemContent[i]['key']}
          style={{ background: 'url(img/portfolio/' + itemContent[i]['mainImageSrc'] + ')' }}
        >
          <div
            className="product-item__hidden-window"
            style={{
              background:
                'linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(img/portfolio/' +
                itemContent[i]['hoverImageSrc'] +
                ')'
            }}
          >
            {itemContent[i]['technologies'].map((item, i, arr) => {
              return (
                <div className="title" key={i}>
                  {item}
                </div>
              );
            })}
          </div>
          <div className="first-description">
            <div className="header">{itemContent[i]['firstHeader']}</div>
            <div className="description">{itemContent[i]['firstDescription']}</div>
            <i className="icon-open" />
            <div className="date">{itemContent[i]['date']}</div>
          </div>
          <div className="full-description">
            <img
              src={close}
              alt="close item"
              onClick={(e) => {
                this.closeItem(e);
              }}
            />
            <div className="header">{itemContent[i]['secondHeader']}</div>
            <div className="description">
              <ul>
                {itemContent[i]['secondDescription'].map((item, i, arr) => {
                  return <li key={i}>{item}</li>;
                })}
              </ul>
              <div className="links-wrapper">
                {itemContent[i]['webSite'] ? (
                  <a href={itemContent[i]['webSite']} target="_blank">
                    <img src="img/link.svg" alt="Go to website" title="Go to website" />
                  </a>
                ) : (
                  ''
                )}
                {itemContent[i]['webSite2'] ? (
                  <a href={itemContent[i]['webSite2']} target="_blank">
                    <img src="img/link.svg" alt="Go to website" title="Go to website" />
                  </a>
                ) : (
                  ''
                )}
                {itemContent[i]['code'] ? (
                  <a href={itemContent[i]['code']} target="_blank">
                    <img className="code" src="img/code.svg" alt="Wiev code" title="Wiev code" />
                  </a>
                ) : (
                  ''
                )}
                {itemContent[i]['code2'] ? (
                  <a href={itemContent[i]['code2']} target="_blank">
                    <img className="code" src="img/code.svg" alt="Wiev code" title="Wiev code" />
                  </a>
                ) : (
                  ''
                )}
              </div>
            </div>
          </div>
        </div>
      );
    });
    return <section className="product-wrapper">{item}</section>;
  }
}

export default Portfolio;
