import React, { Component } from 'react';

class Contacts extends Component {
  render() {
    return (
      <section className="contacts" id="contacts">
        <div className="container">Contact Get in touch: hey@timmyomahony.com</div>
        <p>
          Are you looking for a professional, communicative & punctual software engineer with extensive full-stack web
          development skills for your next project? If you have an application you are interested in developing with web
          technology, I’d love to work with you on it. I’m a full-stack developer which means I can bring your project
          from concept to completion. I work primarily with Django and Node.js on the back-end and Ember.js on the
          front-end but picking up new languages or frameworks isn’t a problem. hey@timmyomahony.com
        </p>
        <p>
          Fyodor Popov fyodor.work@gmail.com I’m Ukrainian software developer. I can help you to build and grow your
          next product.
        </p>
        <p>
          Feel free to reach out at <b /> or follow me on
          <b>
            <a href="" target="_blank">
              Dribbble
            </a>
          </b>,
          <b>
            <a href="" target="_blank">
              Twitter
            </a>
          </b>,
          <b>
            <a href="" target="_blank">
              Instagram
            </a>
          </b>{' '}
          or
          <b>
            <a href="" target="_blank">
              Linkedin
            </a>
          </b>.
        </p>
      </section>
    );
  }
}

export default Contacts;
