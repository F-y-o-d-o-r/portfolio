import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import { post_send } from '../mail/mail';
//import ReCAPTCHA from 'react-google-recaptcha';
let autosize = require('autosize');
var phpmail = require('../mail/php/mail.php');
require('../mail/php/PHPMailer/Exception.php');
require('../mail/php/PHPMailer/PHPMailer.php');
require('../mail/php/PHPMailer/SMTP.php');
var Recaptcha = require('react-recaptcha');

let recaptchaInstance;

class BackForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      showModal: false,
      email: '',
      message: '',
      captcha: false
    };
    this.handleShow = this.handleShow.bind(this);
    this.handleHide = this.handleHide.bind(this);
    this.callback = this.callback.bind(this);
    this.verifyCallback = this.verifyCallback.bind(this);
    this.expiredCallback = this.expiredCallback.bind(this);
    this.resetRecaptcha = this.resetRecaptcha.bind(this);
  }
  handleShow() {
    post_send('body', phpmail, [ 'email', 'message' ], [ this.state.email, this.state.message ]);
    this.setState({ showModal: true });
    console.log('handleShow: this.state.captcha =>', this.state.captcha);
  }

  handleHide() {
    this.setState({ showModal: false });
    setTimeout(() => {
      autosize.update(document.querySelectorAll('textarea'));
    }, 1000);
  }
  componentDidMount() {
    autosize(document.querySelector('textarea'));
  }
  onChange(value) {
    console.log('onchange this => ', this, ' value => ', value);
    //this.setState({ captcha: true });
    // console.log('value in start of onchange => ', value, thiss);
    // return new Promise((resolve, reject) => {
    //   if (value !== null) {
    //     console.log('not null value of captha in promise => ', value);
    //     resolve(true);
    //   } else {
    //     console.log('null value of captha in promise => ', value);
    //     reject(false);
    //   }
    //   //Your code logic goes here
    //   //console.log('new version in promise before setSate => Captcha value:', value);
    //   //console.log('in promise before setSate =>', this.state.captcha);
    //   //in promise before setSate => Captcha value: null
    //   //console.log('in promise after setSate =>', this.state.captcha);
    //   //Instead of using 'return false', use reject()
    //   //Instead of using 'return' / 'return true', use resolve()
    // })
    //   .then((result) => {
    //     console.log('result => ', result);
    //     console.log('then this => ', this);
    //     //this.setState({ captcha: true });
    //   })
    //   .catch((error) => {
    //     console.log('error => ', error);
    //   });
    //console.log(this.state.captcha);
    //this.setState({ captcha: true });
  }
  callback() {
    console.log('callback => this => ', this);
  }
  verifyCallback(response) {
    console.log('verifyCallback =>  this => ', this, 'verifyCallback => response => ', response);
    this.setState({ captcha: true });
  }
  expiredCallback() {
    console.log(`Recaptcha expired =>  this => `, this);
    this.setState({ captcha: false });
  }
  resetRecaptcha() {
    //recaptchaInstance.reset();
    this.setState({ captcha: false });
  }
  render() {
    //const capcha = (
    // <div>{<ReCAPTCHA sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG" onChange={this.onChange()} />}</div>
    // <div>
    //   <Recaptcha
    //     sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG"
    //     onloadCallback={this.callback()}
    //     verifyCallback={this.verifyCallback()}
    //   />
    //<div />
    // <Recaptcha
    //   sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG"
    //   onloadCallback={callback()}
    //   verifyCallback={verifyCallback()}
    //   render="explicit"
    //   theme="dark"
    // />
    //);
    const modal = this.state.showModal ? (
      <ModalWindow domNode={document.querySelector('body')}>
        <div className="modal">
          <div>Thank you for your message.</div>
          <button className="modal-button" onClick={this.handleHide}>
            Close
          </button>
        </div>
      </ModalWindow>
    ) : null;

    return (
      <Formik
        initialValues={{ email: '', textarea: '' }}
        validate={(values) => {
          let errors = {};
          if (!values.email) {
            errors.email = 'Required';
          } else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i.test(values.email)) {
            errors.email = 'Invalid email address';
          }
          if (!values.textarea) {
            errors.textarea = 'Required';
          }
          return errors;
        }}
        onSubmit={(values, { setSubmitting }) => {
          console.log('onSubmit => ', this);
          //if (this.state.captcha === true) {
          if (true) {
            console.log('onSubmit if => ', this);
            setTimeout(() => {
              this.setState((state) => {
                state.message = values.textarea;
                state.email = values.email;
              });
              this.handleShow();
              setSubmitting(false);
              values.email = '';
              values.textarea = '';
              this.resetRecaptcha();
            }, 400);
          } else {
            setSubmitting(false);
            console.log('you are robot!', this.state);
          }
        }}
      >
        {({ isSubmitting, errors, touched }) => (
          <Form>
            <p>Email</p>
            <Field type="email" name="email" />
            <ErrorMessage name="email" component="div" className="form-error" />
            <p>Message</p>
            <Field type="textarea" name="textarea" component="textarea" />
            <ErrorMessage name="textarea" component="div" className="form-error" />
            {/* <div
              className="g-recaptcha"
              data-sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG"
              onChange={this.onChange()}
            /> */}
            {/* {capcha} */}
            {/* <Recaptcha
              sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG"
              onloadCallback={this.callback}
              verifyCallback={this.verifyCallback}
              expiredCallback={this.expiredCallback}
              render="explicit"
              ref={(e) => (recaptchaInstance = e)}
            /> */}

            <div className="text-danger" id="recaptchaError" />
            <button type="submit" disabled={isSubmitting}>
              Submit
            </button>
            {modal}
          </Form>
        )}
      </Formik>
    );
  }
}

class ModalWindow extends Component {
  render() {
    return ReactDOM.createPortal(this.props.children, this.props.domNode);
  }
}

export default BackForm;
