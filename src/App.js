import React, { Component } from 'react';
import './App.css';
import Preloader from './components/Preloader';
import Header from './components/Header';
import FirstScreen from './components/FirstScreen';
import Photo from './components/PhotoBlock';
import Portfolio from './components/Portfolio';
//import Contacts from './components/Contacts';

class App extends Component {
  constructor(props) {
    super(props);
  }
  componentDidMount() {}
  state = {
    links: {
      link1: 1
    }
  };
  render() {
    return (
      <React.Fragment>
        <Header />
        <FirstScreen />
        <Photo />
        <Portfolio />
        {/* <Contacts /> */}
        <Photo />
      </React.Fragment>
    );
  }
}

export default App;
