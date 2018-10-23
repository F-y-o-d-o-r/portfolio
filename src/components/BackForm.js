import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Formik, Form, Field, ErrorMessage } from 'formik';

class BackForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      showModal: false,
      message: ''
    };
    this.handleShow = this.handleShow.bind(this);
    this.handleHide = this.handleHide.bind(this);
  }
  handleShow() {
    this.setState({ showModal: true });
  }

  handleHide() {
    this.setState({ showModal: false });
  }
  render() {
    const modal = this.state.showModal ? (
      <ModalWindow domNode={document.querySelector('body')}>
        <span>It is modal window</span>
        <button className="modal-button" onClick={this.handleHide}>
          Hide modal
        </button>
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
          setTimeout(() => {
            console.log(JSON.stringify(values, null, 2));
            this.setState((state) => {
              state.message = JSON.stringify(values, null, 2);
            });
            this.handleShow();
            setSubmitting(false);
            console.log(this.state.message);
            values.email = '';
            values.textarea = '';
          }, 400);
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
// class BackForm extends Component {
//   render() {
//     return (
//       <ModalWindow domNode={document.querySelector('body')}>
//         <span>It is modal window</span>
//       </ModalWindow>
//     );
//   }
// }

export default BackForm;
