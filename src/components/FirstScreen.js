import React, { Component } from 'react';
import { TimelineLite } from 'gsap/TweenMax';
import { Nav } from './Header';
import img from '../img/photo_small.jpg';

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
      .from('header', 1.5, { opacity: 0, force3D: true, y: -100 }, '+=1')
      .from('.info h1', 0.7, { opacity: 0, force3D: true, x: -100 }, +2)
      .from('.info h2', 0.7, { opacity: 0, force3D: true, x: 100 }, +2)
      .from('.info .text-wrapper', 0.7, { opacity: 0, force3D: true, y: 100, x: -100 }, +2)
      .from('.info .img-wrapper', 0.7, { opacity: 0, force3D: true, y: 100, x: 100 }, +2)
      .from('.info .second-info', 0.7, { opacity: 0, force3D: true, y: 100 }, +2);
  }
  componentDidMount() {
    this.lettersAnimation();
  }
  smothScroll(e) {
    e.preventDefault();
    this.Nav.smothScroll(e);
  }
  render() {
    return (
      <div className="container">
        <div className="info">
          <h1>Hello, my name is Fyodor. I am a Front End Web Developer living in Chernigov, Ukraine</h1>
          <h2>
            Producing high quality responsive websites. I can help you to build your next product. Have a project you'd
            like to discuss? Let's{' '}
            <a onClick={(e) => this.smothScroll(e)} href="#contacts" title="Will scroll to my contacts">
              chat
            </a>
          </h2>
          <div className="blocks-wrapper">
            <div className="text-wrapper">
              <h3>Here’s a couple of things I’m good at:</h3>
              <p>
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
            <div className="img-wrapper">
              <img src={img} alt="Me" />
            </div>
          </div>
          <div className="second-info">
            <h3>Languages I speak:</h3>
            <p>HTML, Pug, CSS, Sass, JavaScript, jQuery, React, Php, Wordpress, OpenCart</p>
            <h3>Dev Tools:</h3>
            <p>
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
    );
  }
}

export default FirstScreen;
