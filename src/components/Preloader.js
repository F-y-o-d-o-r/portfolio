import React, { Component } from 'react';

class Preloader extends Component {
  componentDidMount() {}
  render() {
    return (
      <div className="preloader-wrapper">
        <div className="holder">
          <div className="preloader">
            <div />
            <div />
            <div />
            <div />
            <div />
            <div />
            <div />
            <div />
            <div />
            <div />
          </div>
        </div>
      </div>
    );
  }
}

export default Preloader;
