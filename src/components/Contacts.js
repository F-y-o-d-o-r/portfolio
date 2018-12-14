import React, { Component } from 'react';
import ScrollMagic from 'scrollmagic';
import { Nav } from './Header';
import BackForm from './BackForm';

class Contacts extends Component {
  constructor(props) {
    super(props);
    this.Nav = new Nav();
  }
  componentDidMount() {
    /*email*/
    let controllerContacts = new ScrollMagic.Controller();
    new ScrollMagic.Scene({
      triggerElement: '.smoth-show-from-div-email',
      duration: 0
    })
      .setClassToggle('.show-this-text2', 'show-text')
      //.addIndicators({ name: 'smoth-show-from-div' })
      .addTo(controllerContacts);
    new ScrollMagic.Scene({
      triggerElement: '.contacts',
      duration: 0
    })
      .setClassToggle('.contacts, .contacts h3 a, .portfolio', 'background-color')
      .addTo(controllerContacts);
  }
  render() {
    return (
      <section className="contacts" id="contacts">
        <div className="container main-contacts-wrapper">
          <div className="text-hide-all smoth-show-from-div-email">
            <h3 className="show-this-text2">
              <a href="mailto:fyodor.work@gmail.com" title="Mail me!">
                fyodor.work&shy;@gmail.com
              </a>{' '}
            </h3>
          </div>
          {/* <div className="animate">
            <BackForm />
          </div> */}
          <div className="animate">
            {/* <p>
              Are you looking for a professional, communicative & punctual software engineer with extensive full-stack
              web development skills for your next project? If you have an application you are interested in developing
              with web technology, I’d love to work with you on it. I’m a full-stack web developer which means I can
              bring your project from concept to completion. I work primarily with Php and Node.js on the back-end and
              JavaScript on the front-end but picking up new languages or frameworks isn’t a problem.
            </p> */}
            <p className="contacts-links">
              Feel free to reach out at <b /> or follow me on
              <b>
                {' '}
                <a href="skype:f-y-o-d-o-r?chat" target="_blank" rel="noopener noreferrer">
                  Skype
                </a>
              </b>,{' '}
              <b>
                <a href="mailto:fyodor.work@gmail.com" target="_blank" rel="noopener noreferrer">
                  Email
                </a>
              </b>,{' '}
              <b>
                <a href="https://t.me/Teodore" target="_blank" rel="noopener noreferrer">
                  Telegram
                </a>
              </b>,{' '}
              <b>
                <a href="https://api.whatsapp.com/send?phone=380936500011" target="_blank" rel="noopener noreferrer">
                  WhatsApp
                </a>
              </b>,{' '}
              <b>
                <a href="viber://add?number=380936500011" target="_blank" rel="noopener noreferrer">
                  Viber
                </a>{' '}
                or{' '}
                <a href="https://www.linkedin.com/in/fyodor-popov-8848098/" target="_blank" rel="noopener noreferrer">
                  LinkedIn
                </a>
              </b>.
            </p>
          </div>
        </div>
        <div className="container contacts-footer">
          <div className="top">
            <a onClick={(e) => this.Nav.smothScroll(e)} href="#top" title="To top" className="contacts-top">
              Top
            </a>

            <a href="#about" onClick={(e) => this.Nav.smothScroll(e)} title="Info about me" className="contacts-about">
              About
            </a>
            <a
              href="#portfolio"
              onClick={(e) => this.Nav.smothScroll(e)}
              title="My portfolio"
              className="contacts-portfolio"
            >
              Portfolio
            </a>
          </div>
        </div>
      </section>
    );
  }
}

export default Contacts;
