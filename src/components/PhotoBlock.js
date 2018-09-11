import React, { Component } from 'react';
import ScrollMagic from 'scrollmagic';
import photo from '../img/photo1.jpg';
//require('ScrollMagicIndicators');

class Photo extends Component {
  componentDidMount() {
    this.photoAnimation();
  }
  photoAnimation() {
    let controllerPhoto = new ScrollMagic.Controller();
    new ScrollMagic.Scene({
      triggerElement: '.photo'
    })
      .setClassToggle('.photo', 'show-photo')
      .addTo(controllerPhoto);
  }
  render() {
    return (
      <section className="photo" id="photo">
        <img src={photo} alt="me" />
        <div className="white-block-1" />
        <div className="white-block-2" />
        <div className="f name-letters">f</div>
        <div className="y name-letters">y</div>
        <div className="o name-letters">o</div>
        <div className="d name-letters">d</div>
        <div className="oo name-letters">o</div>
        <div className="r name-letters">r</div>
      </section>
    );
  }
}

export default Photo;
