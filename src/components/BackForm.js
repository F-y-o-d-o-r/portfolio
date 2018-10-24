import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Formik, Form, Field, ErrorMessage } from 'formik';
require('../mail/php/mail.php');

class BackForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      showModal: false,
      email: '',
      message: ''
    };
    this.handleShow = this.handleShow.bind(this);
    this.handleHide = this.handleHide.bind(this);
  }
  handleShow() {
    this.setState({ showModal: true });
    post_send('body', 'static/media/mail.php', [ 'email', 'message' ], [ this.state.email, this.state.message ]);
  }

  handleHide() {
    this.setState({ showModal: false });
  }
  render() {
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
          setTimeout(() => {
            //console.log('values=>', values.email);
            console.log(JSON.stringify(values, null, 2));
            this.setState((state) => {
              //state.message = JSON.stringify(values, null, 2);
              state.message = values.textarea;
              state.email = values.email;
            });
            this.handleShow();
            setSubmitting(false);
            //console.log('this.state.message=>', this.state.message, 'this.state.email=>', this.state.email);
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

export default BackForm;

var req;
var elem;
//################################################# ФОРМИРОВАНИЕ И ОТПРАВКА POST
//!!!ВЫЗОВ - например, post_send(elemm, 'function.php', ['param'], [param.value])//onclick="post_send('tbody', 'function.php', ['search_what'], [search_what.value])"
//onclick="post_send('download-search', 'form-dowload.php', [], []);" - просто передача страницы целиком
function post_send(elemm, program, param_arr, value_arr) {
  //!!! - элемент - elemm - id, скрипт - program, массивы - param_arr, value_arr
  elem = elemm; //!!! - поступивший elemm присваиваем глобальному elem
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
  if (req.readyState == 4 && req.status == 200) {
    //!!! - проверка условий "успех"// свойство readyState - код готовности сервера, значение 4 – «обработка запроса» (первое стандартное условие для получения ответа)
    // свойство status – код ответа сервера, значение 200 – «запрос обработан успешно» (второе стандартное условие для получения ответа)
    //var elem_r = document.getElementById(elem); //!!! - получаем элемен для вывода// ВТОРОЙ ЭТАП – получение ответа сервера
    //var elem_r = document.querySelector('body'); //!!! - получаем элемен для вывода// ВТОРОЙ ЭТАП – получение ответа сервера
    //elem_r.innerHTML = req.responseText; //!!! - ВЫВОД В ЭЛЕМЕНТ (переданный в post_send(get_send) elemm)
    // свойство responseText – получение ответа сервера в виде строки и вывод
  }
}
