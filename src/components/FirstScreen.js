import React, { Component } from 'react';
import ScrollMagic from 'scrollmagic';
import { TimelineMax, TweenMax } from 'gsap';
import { Nav } from './Header';
import institute from '../img/institute.jpg';
import academy from '../img/academy.jpg';
require('scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js');
require('scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js');

class FirstScreen extends Component {
  componentDidMount() {}
  render() {
    return (
      <section className="first-screen">
        <Info />
      </section>
    );
  }
}

class Info extends Component {
  constructor(props) {
    super(props);
    this.Nav = new Nav();
  }
  componentDidMount() {
    // FIRST SCREEN - TimelineMax
    var controller = new ScrollMagic.Controller({});
    var timeline = new TimelineMax({});
    timeline
      .fromTo('.App-logo', 0.1, { opacity: 1, force3D: true }, { opacity: 0 }, +0.5)
      .staggerTo('.navAnimate', 0.5, { opacity: 0, right: 30, delay: 0, force3D: true }, -0.5)
      .fromTo('header', 0.5, { y: 0, delay: 1 }, { y: -150, delay: 1 }, 0.5)
      .fromTo('.info h1', 0.5, { y: 0, opacity: 1 }, { y: 100, opacity: 0 }, 1.5)
      .fromTo('.info h2', 0.5, { y: 0, opacity: 1 }, { y: 100, opacity: 0 }, '-=0.2')
      .fromTo('.info .scroll-icon', 0.5, { y: 0, opacity: 1 }, { y: 100, opacity: 0 }, '-=0.2');
    new ScrollMagic.Scene({
      triggerHook: 'onCenter',
      offset: 200,
      duration: 0
    })
      .setTween(timeline)
      //.addIndicators({ name: 'First screen' })
      .addTo(controller);
    // SECOND TEXT SCREEN - TweenMax
    var all = document.querySelectorAll('.animate');
    var controller2 = new ScrollMagic.Controller();
    for (var i = 0, max = all.length; i < max; i++) {
      const tween2 = TweenMax.from(all[i], 0.5, { y: 100, opacity: 0 });
      new ScrollMagic.Scene({
        triggerElement: all[i],
        offset: -200
      })
        .setTween(tween2)
        .addTo(controller2);
    }
    /*Here’s a couple of skills I’m good at*/
    let controllerFirstScreen = new ScrollMagic.Controller();
    new ScrollMagic.Scene({
      triggerElement: '.smoth-show-from-div',
      duration: 0,
      offset: -100
    })
      //.setTween(tween)
      .setClassToggle('.show-this-text', 'show-text')
      //.addIndicators({ name: 'smoth-show-from-div' })
      .addTo(controllerFirstScreen);
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
              Hello, my name is Fyodor.<br />I am a Frontend Web Developer living in Chernigov, Ukraine
            </h1>
            <h2>
              Producing high quality responsive websites.<br />I can help you to create your next product.<br />Have a
              project you'd like to discuss? Let's{' '}
              <a onClick={(e) => this.smothScroll(e)} href="#contacts" title="Will scroll to my contacts">
                chat
              </a>
            </h2>
            <img src="img/mouse_scroll.svg" alt="scroll now!" className="scroll-icon" />
          </div>
          <div className="blocks-wrapper" id="about">
            <div className="text-and-header-wrapper">
              <div className="text-hide-all smoth-show-from-div">
                <h3 className="show-this-text">Here’s a couple of skills I’m good at: </h3>
              </div>
              <div className="text-wrapper animate">
                <p>
                  <span>Communication.</span> I realize the importance of well-built communication. I use tools like
                  Slack to make sure we’re always on the same page. <span>Organisation.</span> I believe it’s important
                  to stay organised while working remotely. I use the likes of Trello to keep projects on-track and
                  under control. Project Management I think it’s important to identify the discrete stages of a project
                  and work to a schedule around those. <span>Collaboration.</span> I play well with others. I'm happy to
                  integrate into your existing team to help get your project implemented. <span>Degree.</span> I have a
                  High degree in{' '}
                  <a href={institute} target="_blank" title="Diploma">
                    Management
                  </a>{' '}
                  and degree in{' '}
                  <a href={academy} target="_blank" title="Diploma">
                    Web Development
                  </a>{' '}
                  and recognize the importance of applying proper software development techniques to the web.{' '}
                  <span>Design.</span> I'm not a graphic designer, but I have an eye for a good design. I'm comfortable
                  using Photoshop and other programs for web design. <span>Documentation.</span> Often overlooked, I
                  think it's incredibly important to leave clients with a clear picture of what's been done for the next
                  round of development.
                </p>
                <p>
                  <span>All in all.</span> My work is something I do with honesty, appetite and commitment. Over the
                  past year I had the opportunity to drive and do hands-on work with different firms from all over the
                  world.
                </p>
                <p>
                  I’m currently self-employed and working as a Full Stack Web Developer for Belka-z Company. In my spare
                  time you’ll find me exploring and traveling the world. I love new adventures, meeting new people and
                  mostly capturing the moments with my family.
                </p>
                <p>
                  <span>Ask me for my SV</span> in{' '}
                  <a href="#contacts" onClick={(e) => this.smothScroll(e)} title="My contacts">
                    EN
                  </a>{' '}
                  or in{' '}
                  <a href="#contacts" onClick={(e) => this.smothScroll(e)} title="My contacts">
                    RUS
                  </a>.
                </p>
              </div>
            </div>
            <div className="second-info animate">
              <p>
                <span>Languages I speak: </span>
                HTML, Pug, CSS, Sass, JavaScript, jQuery, Wordpress, OpenCart, React(basics), React-native(basics),
                Php(basics), Laravel(basics)
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
                </a>, Bootstrap, Terminal, Vscode, PhpStorm, Trello, Redmine, Jira, Photoshop, Avocode, Zeplin, Figma
              </p>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default FirstScreen;
