import React, { Component } from 'react';
import ReactAudioPlayer from 'react-audio-player';

export default class AudioPlayer extends Component {
  render() {
    return <ReactAudioPlayer src="audio/bloom-corsa-mozhe.mp3" controls />;
  }
}
