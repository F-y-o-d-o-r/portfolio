import React, { Component } from 'react';
import ScrollMagic from 'scrollmagic';
import { TimelineLite } from 'gsap/TweenMax';
import { gsap, TimelineMax, TweenMax } from 'gsap';
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
  lettersAnimation() {
    var tl2 = new TimelineLite();
    tl2
      .from('header', 1.5, { opacity: 0, force3D: true, y: -100 }, '+=0.5')
      .from('.info h1', 0.7, { opacity: 0, force3D: true, y: 100 }, '+1')
      .from('.info h2', 0.7, { opacity: 0, force3D: true, y: 100 }, '+1.5')
      .from('.info .text-wrapper', 0.7, { opacity: 0, force3D: true, y: 100 }, '+2')
      .from('.info .img-wrapper', 0.7, { opacity: 0, force3D: true, y: 100 }, '+2.5')
      .from('.info .second-info', 0.7, { opacity: 0, force3D: true, y: 100 }, '+3');
  }
  componentDidMount() {
    //this.lettersAnimation();
    // add a timeline to a scene
    var controller = new ScrollMagic.Controller({
      globalSceneOptions: {
        triggerHook: 'onLeave'
      }
    });
    var timeline = new TimelineMax();
    timeline.from('header', 3, { y: -100 }, '+=0.5').from('.info h1', 1, { y: 100, opacity: 0 }, '+=0.5');
    var scene = new ScrollMagic.Scene({
      //triggerElement: '.info h2',
      offset: 200,
      reverse: true,
      duration: 0
    })
      .setTween(timeline)
      .addIndicators({ name: '111' })
      .addTo(controller);

    // //let tween = new TweenMax();
    // let tween = TweenMax.from('header', 1.5, { opacity: 0, force3D: true, y: -100 }, '+=0.5');
    // tween = TweenMax.from('.info h1', 0.7, { opacity: 0, force3D: true, y: 100 }, -2);
    // new ScrollMagic.Scene({
    //   triggerElement: '.info__header-wrapper',
    //   duration: 0
    // })
    //   .setTween(tween)
    //   .addIndicators({ name: 'My Latest Work' })
    //   .addTo(controller);
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
            <div className="text-wrapper">
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
            <div className="second-info">
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
