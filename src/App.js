import React, { Component } from 'react';
import './App.css';
import Preloader from './components/Preloader';
import Header from './components/Header';
import FirstScreen from './components/FirstScreen';
import Portfolio from './components/Portfolio';
//import Contacts from './components/Contacts';

class App extends Component {
  constructor(props) {
    super(props);
    // window.onbeforeunload = function() {
    //   window.scrollTo(0, 0);
    // };
    //window.location.hash = 'top';
    window.scrollTo(0, 0); //! TODO for chrome
    //window.onbeforeunload = function() {
    //window.scrollTo(0, 0);
    //};
    setTimeout(() => {
      //window.scrollTo(0, 0);
    }, 300);
    setTimeout(() => {
      //window.scrollTo(0, 0);
      let preloader = document.getElementsByClassName('holder')[0];
      //preloader.style.opacity = 0;
      //preloader.style.visibility = 'hidden';
      document.body.style.overflow = 'auto';
    }, 2000);
  }
  componentDidMount() {
    //window.scrollTo(0, 0);
    //document.body.scrollTop = document.documentElement.scrollTop = 0;
  }
  state = {
    links: {
      link1: 1
    }
  };
  render() {
    return (
      <React.Fragment>
        {/* <Preloader /> */}
        <Header />
        <FirstScreen />
        <Portfolio />
        {/* <Contacts /> */}
      </React.Fragment>
    );
  }
}

export default App;
