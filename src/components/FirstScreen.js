import React, { Component } from 'react';
//import back1 from '../img/photo1.jpg';

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
  componentDidMount() {}
  render() {
    return (
      <div className="container">
        <div className="info">
          <h1>Hi, I’m Fyodor. Nice to meet you. </h1>
          <h2>
            Since beginning my journey as a freelance designer nearly 8 years ago, I've done remote work for agencies,
            consulted for startups, and collaborated with talented people to create digital products for both business
            and consumer use. I'm quietly confident, naturally curious, and perpetually improving my chops.
          </h2>
        </div>
      </div>
    );
  }
}

export default FirstScreen;
