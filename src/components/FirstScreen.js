import React, { Component } from 'react';
import ScrollMagic from 'scrollmagic';
import { TimelineLite } from 'gsap/TweenMax';
import { TimelineMax, TweenMax } from 'gsap';
import { Nav } from './Header';
import img from '../img/photo_small.jpg';
//const TweenMax = require('TweenMax');
//const ScrollMagic = require('ScrollMagic');
require('ScrollMagicIndicators');
require('AnimationGsap');

class FirstScreen extends Component {
  componentDidMount() {}
  render() {
    return (
      <section className="first-screen" id="about">
        <Info />
      </section>
    );
  }
}

class Info extends Component {
  constructor(props) {
    super(props);
    console.log();
    this.Nav = new Nav();
  }
  componentDidMount() {
    // FIRST SCREEN
    var controller = new ScrollMagic.Controller({});
    var timeline = new TimelineMax({});
    timeline
      .fromTo('.App-logo', 0.1, { opacity: 1, force3D: true }, { opacity: 0 }, +0.5)
      .staggerTo('.navAnimate', 0.5, { opacity: 0, right: 30, delay: 0, force3D: true }, -0.5)
      .fromTo('header', 0.5, { y: 0, delay: 1 }, { y: -100, delay: 1 }, 0.5)
      .fromTo('.info h1', 0.5, { y: 0, opacity: 1 }, { y: 100, opacity: 0 }, 1.5)
      .fromTo('.info h2', 0.5, { y: 0, opacity: 1 }, { y: 100, opacity: 0 }, '-=0.2');
    var scene = new ScrollMagic.Scene({
      triggerHook: 'onCenter',
      offset: 200,
      duration: 0
    })
      .setTween(timeline)
      .addIndicators({ name: 'First screen' })
      .addTo(controller);
    // SECOND TEXT SCREEN
    var all = document.querySelectorAll('.animate');
    var controller2 = new ScrollMagic.Controller();
    for (var i = 0, max = all.length; i < max; i++) {
      const tween2 = TweenMax.from(all[i], 0.5, { y: 100, opacity: 0 });
      var myScene = new ScrollMagic.Scene({
        triggerElement: all[i],
        offset: -200
      })
        .setTween(tween2)
        .addTo(controller2);
    }
  }
  smothScroll(e) {
    e.preventDefault();
    this.Nav.smothScroll(e);
  }
  render() {
    return (
      <div className="container">
        <div className="info">
          <div className="info__header-wrapper">
            <h1>
              Hello, my name is Fyodor.<br />I am a Front End Web Developer living in Chernigov, Ukraine
            </h1>
            <h2>
              Producing high quality responsive websites.<br />I can help you to build your next product.<br />Have a
              project you'd like to discuss? Let's{' '}
              <a onClick={(e) => this.smothScroll(e)} href="#contacts" title="Will scroll to my contacts">
                chat
              </a>
            </h2>
          </div>
          <div className="blocks-wrapper">
            <div className="text-wrapper animate">
              <p>
                <span>Here’s a couple of things I’m good at: </span>
                Communication I realize the importance of good communication. I use tools like Slack to make sure we’re
                always on the same page. Organisation I believe it’s important to stay organised while working remotely.
                I use the likes of Trello to help keep projects on-track and under control. Project Management I think
                it’s important to identify the discrete stages of a project and work to a schedule around those.
                Collaboration I play well with others. I'm happy to integrate into your existing team to help get your
                project implemented. I have a High degree in Management and Web Development and recognize the importance
                of applying proper software development techniques to the web. I'm not a graphic designer, but I have an
                eye for good design. I'm comfortable using Photoshop. Documentation Often overlooked, I think it's
                incredibly important to leave clients with a clear picture of what's been done for the next round of
                development.
              </p>
              <p>
                My work is something I do with lot of honesty, appetite and commitment. Over the past years I had the
                opportunity to drive and do hands-on work for different firms from all over the world.
              </p>
              <p>
                I’m currently self-employed and working as a Full Stack Web Developer at Belka-z. In my spare time
                you’ll find me exploring and traveling the world. I love new adventures, meeting new people and mostly
                capturing the moments with my family.
              </p>
            </div>
            {/* <div className="img-wrapper">
              <img src={img} alt="Me" />
            </div> */}
            <div className="second-info animate">
              <p>
                <span>Languages I speak: </span>
                HTML, Pug, CSS, Sass, JavaScript, jQuery, React, Php, Wordpress, OpenCart
              </p>
              <p>
                <span>Dev Tools: </span>
                Gulp, Npm, Webpack,{' '}
                <a
                  href="https://bitbucket.org/Fyodor_/"
                  rel="noopener noreferrer"
                  target="_blank"
                  title="My Bitbucket profile in new window"
                >
                  Bitbucket
                </a>,{' '}
                <a
                  href="https://github.com/F-y-o-d-o-r"
                  rel="noopener noreferrer"
                  target="_blank"
                  title="My Github profile in new window"
                >
                  Github
                </a>, Bootstrap, Terminal, Vscode, PhpStorm, Trello, Redmine
              </p>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default FirstScreen;
