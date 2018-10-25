import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Formik, Form, Field, ErrorMessage } from 'formik';
import ReCAPTCHA from 'react-google-recaptcha';
let autosize = require('autosize');
//require('../mail/php/mail.php');
var phpmail = require('../mail/php/mail.php');
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
    recaptchaInstance.reset();
    this.setState({ captcha: false });
  }
  render() {
    const capcha = (
      // <div>{<ReCAPTCHA sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG" onChange={this.onChange()} />}</div>
      // <div>
      //   <Recaptcha
      //     sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG"
      //     onloadCallback={this.callback()}
      //     verifyCallback={this.verifyCallback()}
      //   />
      <div />
      // <Recaptcha
      //   sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG"
      //   onloadCallback={callback()}
      //   verifyCallback={verifyCallback()}
      //   render="explicit"
      //   theme="dark"
      // />
    );
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
          if (this.state.captcha === true) {
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
            <Recaptcha
              sitekey="6Lern3YUAAAAAAnVS3n5dXC2cFo9ByOWmRpOQEJG"
              onloadCallback={this.callback}
              verifyCallback={this.verifyCallback}
              expiredCallback={this.expiredCallback}
              render="explicit"
              ref={(e) => (recaptchaInstance = e)}
            />

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

var req;
//var elem;
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА POST
//!!!ВЫЗОВ - например, post_send(elemm, 'function.php', ['param'], [param.value])//onclick="post_send('tbody', 'function.php', ['search_what'], [search_what.value])"
//onclick="post_send('download-search', 'form-dowload.php', [], []);" - просто передача страницы целиком
function post_send(elemm, program, param_arr, value_arr) {
  //!!! - элемент - elemm - id, скрипт - program, массивы - param_arr, value_arr
  //elem = elemm; //!!! - поступивший elemm присваиваем глобальному elem
  req = new XMLHttpRequest(); // ПЕРВЫЙ ЭТАП - создаем объект XMLHttpRequest()
  req.open('POST', program, true); // ВТОРОЙ ЭТАП – создаем запрос POST– запрос
  //создаем - POST – запрос, program - выполняемый POST- скрипт php, true – асинхронная передача (false - синхронная – до получения ответа от сервера пользователь ничего не сможет сделать на странице – поэтому применяется крайне редко)
  // !!! - скрипт - program
  req.onreadystatechange = func_response; // ТРЕТИЙ ЭТАП – инициализируем функцию приема результата (в т.ч. – проверки при приеме)
  //!!! - инициализация функции проверки и приема// func_response – задание функции проверки и получения ответных данных (отрабатывается позже)
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); // ЧЕТВЕРТЫЙ ЭТАП – добавляет http-заголовок (только для POST!!!)
  //!!! - заголовок
  var str = ''; //!!! - начальный str=''
  for (var i = 0; i < param_arr.length; i++) {
    //!!! - массивы - перебор
    // ПЯТЫЙ ЭТАП – «упаковываем» (создаем) http - запрос
    // отправляемые входные данные необходимо «упаковать» в строку типа http
    str += param_arr[i] + '=' + encodeURIComponent(value_arr[i]) + '&'; //!!! - накапливаем str
  }
  req.send(str); // ШЕСТОЙ ЭТАП – передаем запрос POST на сервер
  //!!! - отправка
}

function func_response() {
  //!!! - функция проверки и приема
  // ПЕРВЫЙ ЭТАП – проверка кода готовности сервера и кода ответа сервера
  if (req.readyState === 4 && req.status === 200) {
    //!!! - проверка условий "успех"// свойство readyState - код готовности сервера, значение 4 – «обработка запроса» (первое стандартное условие для получения ответа)
    // свойство status – код ответа сервера, значение 200 – «запрос обработан успешно» (второе стандартное условие для получения ответа)
    //console.log('sent');
    // let form = new BackForm();
    // form.handleShow();
    // console.log('sent2');
    //var elem_r = document.getElementById(elem); //!!! - получаем элемен для вывода// ВТОРОЙ ЭТАП – получение ответа сервера
    //var elem_r = document.querySelector('body'); //!!! - получаем элемен для вывода// ВТОРОЙ ЭТАП – получение ответа сервера
    //elem_r.innerHTML = req.responseText; //!!! - ВЫВОД В ЭЛЕМЕНТ (переданный в post_send(get_send) elemm)
    // свойство responseText – получение ответа сервера в виде строки и вывод
  }
}
