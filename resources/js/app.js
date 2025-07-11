/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 *///

require('./bootstrap');

window.Vue = require('vue');
import i18n from './i18n';

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, { timeout: 9000 })

// router.beforeEach((to, from, next) => {
//   // التحقق من وجود اللغة في المسار
//   const langInURL = to.params.lang;

//   if (langInURL && ['en', 'ar', 'es', 'fr', 'de'].includes(langInURL)) {
//     i18n.locale = langInURL; // ضبط اللغة بناءً على المسار
//     localStorage.setItem('preferredLanguage', langInURL); // حفظ اللغة في localStorage
//   } else {
//     const savedLanguage = localStorage.getItem('preferredLanguage') || 'de';
//     i18n.locale = savedLanguage; // ضبط اللغة بناءً على localStorage إذا لم يكن هناك لغة في URL
//     next(`/${savedLanguage}`); // إعادة التوجيه إلى اللغة المخزنة
//   }

//   next();
// });
const savedLanguage = localStorage.getItem('preferredLanguage') || 'de';
i18n.locale = savedLanguage;



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('global-home', require('./components/GlobalHome.vue').default);
Vue.component('language-switcher', require('./components/LanguageSwitcher.vue').default);

Vue.component('processed-data', require('./components/ProcessedData.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);


import router from './routes/routes'
import Axios from 'axios';

import Vuex from 'vuex';


Vue.use(Vuex)
// https://stackoverflow.com/questions/71294692/how-to-fetch-data-from-api-in-vuex
// https://medium.com/@esmaydogdu/vuex-fetch-b0e8472e7676
const store = new Vuex.Store({
  state: {
    userToken: null,
    userIdNumber: null,
    productId: null,
    user: null,
    EditedPost: {},
    searchProducts: {},
    // OrderDetails: {},
    OrderDetails: '2',
    contactInfo: '',
    goethes: [],
    telcs: [],
    exams: [],
    LevelDesc: {},
    questions: [],
    quizes: [],
    QuizesTest: [],
    CurrentPage: null,
    Results: {},
    basName: "https://deutschtests.com/api/",
    examAnswer: [],
    // levelId:null,
    contactInfo: '',
    goetheUserExam: [],
    GoetheReportExam: [],
    TelcUserExam: [],
    processedData: null
  },
  getters: { //center
    isLogged(state) {
      return !!state.userToken;
    },
    isAdmin(state) {
      if (state.user) {
        return state.user.is_admin
      }
      return null
    },
    PostToEdit(state) {
      return state.EditedPost
    },
    getSearchProducts(state) {
      return state.searchProducts
    },
    getOrderDetails(state) {
      return state.OrderDetails
    },

  },
  mutations: {
    setProcessedData(state, payload) {
      state.processedData = payload;
    },
    setUserToken(state, userToken) {
      state.userToken = userToken;
      localStorage.setItem('userToken', JSON.stringify(userToken));
      axios.defaults.headers.common.Authorization = `Bearer ${userToken}`
    },
    setUserIdNumber(state, userIdNumber) {
      state.userIdNumber = userIdNumber;
      localStorage.setItem('userIdNumber', userIdNumber);

    },
    removeUserToken(state) {

      state.userToken = null;
      localStorage.removeItem('userToken')
    },
    setUser(state, user) {
      state.user = user
    },
    logout(state) {
      state.userToken = null;
      localStorage.removeItem('userToken');
      window.location.pathname = "/"
    },
    EditPost(state, post) {
      state.EditedPost = post;
    },
    saveSearchProducts(state, products) {
      state.searchProducts = products;
    },
    saveOrderDetails(state, datails) {
      state.OrderDetails = datails;
    },
    updateContactinfo(state, contactinfo) {
      state.contactInfo = contactinfo;
    },
    updateGoethe(state, levels) {
      state.goethes = levels;
    },
    updateTelc(state, levels) {
      state.telcs = levels;
    },
    updateExams(state, exams) {
      state.exams = exams;
    },
    updateLevelDesc(state, leveldesc) {
      state.LevelDesc = leveldesc;
    },
    updateQuestions(state, questions) {
      state.questions = questions;
    },
    updateQuizes(state, quizes) {
      state.quizes = quizes;
    },
    updateQuizesTest(state, quizestest) {
      state.QuizesTest = quizestest;
    },

    updateCurrentPage(state, currentPage) {
      state.CurrentPage = currentPage;
    },
    updateResults(state, results) {
      state.Results = results;
    },
    updateContactinfo(state, contactinfo) {
      state.contactInfo = contactinfo;
    },
    updateGoetheUserExams(state, exams) {
      state.goetheUserExam = exams;
    },
    updateGoetheReportExam(state, exams) {
      state.GoetheReportExam = exams;
    },
    updateTelcUserExams(state, exams) {
      state.TelcUserExam = exams;
    },
  },
  actions: {
    getQuizes({ state, commit }, payload) {
      console.log(payload.levelName + 'vcxcc' + payload.type);
      // axios.get(state.basName+'exams?level_id='+payload)
      axios.get('https://deutschtests.com/api/quizes', {
        params: {
          data: JSON.stringify(payload.quizes),
          levelName: payload.levelName,
          type: payload.type,
          user_id: payload.user_id
        }
      })
        // axios.get(state.basName+'quizes?levelName='+payload.levelName+'&type='+payload.type,)
        .then(res => {
          // console.log(res.data + '');
          if (res.data.data.length != 0) {

            store.commit('updateQuizes', res.data.data);
          } else {
            if (payload.user_id != 0) {


              let data = { 'user_id': payload.user_id };
              axios.post('https://deutschtests.com/api/edit-quize-test', data)
                .then(res => {
                  // console.log(res)
                  router.push('/placement-result')
                  // router.push({ name: 'PlacementResult' })

                })
                .catch(err => {
                  console.log(err)
                })



              console.log(payload.user_id + 'i user');


            } else {
              router.push({ name: 'NoResult' })
            }
          }
        })
        .then(err => console.log(err))
    },
    userQuizesTest({ state, commit }) {
      const headers = {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + state.userToken
      };
      axios.get('https://deutschtests.com/api/user-quizes-test', { headers })
        .then(res => {
          console.log(res.data.data.id + "my-quizes-test");
          store.commit('updateQuizesTest', res.data.data.quizes_answers);
          console.log(res.data.data.quizes_answers + 'mariam khalmjbbb data');
        })
        .then(err => console.log(err))
    },
    RegisterUser({ commit }, payload) {
      return new Promise((resolve, reject) => {
        axios.post('https://deutschtests.com/api/register', payload)
          .then(res => {
            if (res.data.status == true) {
              commit('setUserToken', res.data.data.token);
              commit('setUserIdNumber', res.data.data.id);
              swal({
                title: i18n.t('successfullyRegistered'),
                text: i18n.t('received'),
                icon: "success",
                timer: 10500
              });
              router.push({ name: 'Levels' });
            } else {
              swal({
                title: i18n.t('occurred'),
                text: res.data.msg,
                icon: "error",
                timer: 10500
              });
              router.push({ name: 'Register' });
            }
            resolve(); // انتهى بنجاح (حتى لو كانت الحالة false)
          })
          .catch(err => {
            console.log(err);
            swal({
              title: 'Serverfehler',
              text: 'Etwas ist schief gelaufen. Bitte versuchen Sie es später erneut.',
              icon: "error",
              timer: 10500
            });
            reject(err); // خطأ في الاتصال
          });
      });
    },

    // RegisterUser({ commit }, payload) {
    //   axios.post('https://deutschtests.com/api/register', payload)
    //     .then(res => {
    //       if (res.data.status == true) {
    //         commit('setUserToken', res.data.data.token);
    //         commit('setUserIdNumber', res.data.data.id);
    //         swal({
    //           title: 'Erfolgreich registriert',
    //           text: res.data.msg,
    //           icon: "success",
    //           timer: 10500
    //         });
    //         router.push({ name: 'Levels' })
    //       } else {
    //         router.push({ name: 'Register' })
    //         swal({
    //           title: 'Da ist ein Fehler',
    //           text: res.data.msg,
    //           icon: "error",
    //           timer: 10500
    //         });
    //       }
    //     }).catch(err => {
    //       console.log(err)
    //     })

    //     .finally(() => {
    //       // ✅ سواء نجح أو فشل، نوقف التحميل
    //       commit('setLoading', false);
    //     });
    // },
    LoginUser({ commit }, payload) {
      axios.post('https://deutschtests.com/api/login', payload)
        .then(res => {
          console.log(res.data);
          if (res.data.status == true) {
            var resTitle = 'Erfolgreich registriert';
          } else {
            var resTitle = i18n.t('occurred');
          }
          console.log(resTitle);

          if (res.data.status == true) {
            commit('setUserToken', res.data.data.token);
            commit('setUserIdNumber', res.data.data.id);
            console.log(res.data.data.id + 'gggggggggggg');
            // localStorage.setItem('userTokenn', JSON.stringify('hgcychchchcghchgchghcgchgchgchgchg'));
            router.push({ name: 'Levels' })
            swal({
              title: resTitle,
              text: i18n.t('received'),
              icon: "success",
              timer: 10500
            });
          } else {
            router.push({ name: 'Login' })
            swal({
              title: resTitle,
              text: i18n.t('wrongEmail'),
              icon: "error",
              timer: 10500
            });
          }


        })
        .catch(err => {
          console.log(err)
        })
    },
    ForgetPassword({ commit }, payload) {
      axios.post('https://deutschtests.com/api/forgetpassword', payload)
        .then(res => {
          console.log(res.data);
          if (res.data.status == true) {
            var resTitle = 'wurde gesendet';
            swal({
              title: resTitle,
              text: res.data.msg,
              icon: "success",
              timer: 10500
            });
          } else {
            var resTitle = 'Da ist ein Fehler';
            swal({
              title: resTitle,
              text: res.data.msg,
              icon: "error",
              timer: 10500
            });
          }
          console.log(resTitle);
          commit('setUserToken', res.data.data.token);



        })
        .catch(err => {
          console.log(err)
        })
    },
    userUpdate({ commit, state }, payload) {
      console.log('vreferfr');
      console.log(state.userToken.token);
      console.log('ferfrefrfre');

      const headers = {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + state.userToken.token
      };
      axios.post('https://deutschtests.com/api/profile-update', payload, { headers })
        .then(res => {
          if (res.data.status == true) {
            var resTitle = 'uvbujhbjh';
          } else {
            var resTitle = 'jbjhbj';
          }
          // if(res.data.status==true){
          //     router.push({ name: 'Login'})
          // }
          swal({
            title: resTitle,
            text: res.data.msg,
            icon: "success",
            timer: 10500
          });
          console.log(res.data)
          // commit('setUserToken', res.data.token)

        })
        .catch(err => {
          console.log(err)
        })
    },
    CheckUserAuth({ state }) {
      const headers = {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + state.userToken
      };
      console.log(state.userToken + 'vvvvvbbbtttt');
      axios.get('https://deutschtests.com/api/check-user-auth', headers)
        .then(res => {
          // console.log(res.data.msg);
          if (res.data.msg == 'You must login first') {
            state.userToken = null;
            localStorage.removeItem('userToken');
            localStorage.removeItem('userIdNumber');
            console.log('You are loged out');
            console.log(res.data.msg);
            console.log('You are loged out');
            // window.location.pathname = "/"
          } else {
            console.log('You are loged in');
          }
          // if (res.data == 'You must login first') {
          //   state.userToken = null;
          //   localStorage.removeItem('userToken');
          //   console.log('You must login first');
          //   // window.location.pathname = "/"
          // } else {
          //   console.log('You must login first');
          // }
        })
        .then(err => console.log(err))
    },

    getContactinfo({ commit }) {
      axios.get('https://deutschtests.com/api/contactinfo')
        .then(res => {
          // console.log(res.data.data);
          store.commit('updateContactinfo', res.data.data);
        })
        .catch(err => {
          console.log(err)
        })
    },
    getGoethes({ state, commit }) {
      axios.get(state.basName + 'goethes')
        .then(res => {
          console.log(res.data.data);
          store.commit('updateGoethe', res.data.data);
        })
        .then(err => console.log(err))
    },
    getTelcs({ state, commit }) {
      axios.get(state.basName + 'telcs')
        .then(res => {
          // console.log(res.data.data);
          store.commit('updateTelc', res.data.data);
        })
        .then(err => console.log(err))
    },
    getExams({ state, commit }, payload) {
      console.log(payload);
      console.log('vvvvvvvvvvbbbnn');
      console.log(i18n.locale);
      console.log(localStorage.getItem('preferredLanguage'));
      if (i18n.locale) {
        console.log('arrhhhhhhhr yes');
        console.log(i18n.locale);
        var lang = i18n.locale;
      } else {
        console.log('arrhhhhhhhr noooo');
        var lang = 'de';
      }

      axios.get(state.basName + 'exams?levelSlug=' + payload + '&lang=' + lang)
        .then(res => {
          console.log(res.data.data);
          store.commit('updateExams', res.data.data.exam);
          store.commit('updateLevelDesc', res.data.data.level);

        })
        .then(err => console.log(err))
    },
    getExamsTelc({ state, commit }, payload) {
      // console.log(payload);
      if (i18n.locale) {
        console.log('arrhhhhhhhr yes');
        console.log(i18n.locale);
        var lang = i18n.locale;
      } else {
        console.log('arrhhhhhhhr noooo');
        var lang = 'de';
      }
      axios.get(state.basName + 'telc-exams?levelSlug=' + payload + '&lang=' + lang)
        .then(res => {
          console.log(res.data.data);
          store.commit('updateExams', res.data.data.exam);
          store.commit('updateLevelDesc', res.data.data.level);

        })
        .then(err => console.log(err))
    },
    getGoetheUserExams({ state, commit }, payload) {
      axios.get(state.basName + 'goethe-user-exams?user_id=' + payload.userId)
        .then(res => {
          console.log('dddd');
          console.log(res.data.data);
          console.log('ddd');
          store.commit('updateGoetheUserExams', res.data.data);
        })
        .then(err => console.log(err))
    },
    getGoetheReportExams({ state, commit }, payload) {
      console.log(payload.pageId);
      console.log(payload.examId + 'ex');
      axios.get(state.basName + 'goethe-report-exams?user_id=' + payload.userId + '&exam_id=' + payload.examId + '&page=' + payload.pageId)
        .then(res => {
          console.log(res.data.data);

          if (res.data.data.data.length != 0) {
            store.commit('updateGoetheReportExam', res.data.data.data);
            store.commit('updateCurrentPage', res.data.data.current_page);
          } else {
            // this.$root.$router.push({
            //   path: '/my-result/' + payload.userId+'/'+payload.examId, 
            //   params: { test: 'testyy' }
            // });
            // router.push({
            //   path: '/my-result/' + payload.userId+'/'+payload.examId, 
            //   params: { test: 'testyy' }
            // });
            router.push({ name: 'Result', params: { user_id: payload.userId, examId: payload.examId } })
          }
        })
        .then(err => console.log(err))
    },
    getTelcUserExams({ state, commit }, payload) {
      axios.get(state.basName + 'telc-user-exams?user_id=' + payload.userId)
        .then(res => {
          console.log('dddd');
          console.log(res.data.data);
          console.log('ddd');
          store.commit('updateTelcUserExams', res.data.data);
        })
        .then(err => console.log(err))
    },

    getQuestions({ state, commit }, payload) {
      console.log(payload);
      // axios.get(state.basName+'exams?level_id='+payload)
      axios.get(state.basName + 'questions?exam_id=' + payload.examId + '&page=' + payload.pageId)
        .then(res => {
          // console.log('Component mountvvvvmmmm.');
          console.log(res.data.data);
          if (res.data.data.data.length != 0) {
            store.commit('updateQuestions', res.data.data.data);
            store.commit('updateCurrentPage', res.data.data.current_page);
          } else {
            if (payload.user_id != 0) {
              // this.$root.$router.push({
              //     path: '/my-result/' + payload.user_id+'/'+payload.examId, 
              //     params: { test: 'testyy' }
              // });
              router.push({ name: 'Result', params: { user_id: payload.user_id, examId: payload.examId } })
            } else {
              router.push({ name: 'NoResult' })
            }

          }
        })
        .then(err => console.log(err))
    },
    getQuestionResult({ state, commit }, payload) {
      console.log(payload);
      // axios.get(state.basName+'exams?level_id='+payload)

      axios.get(state.basName + 'results?user_id=' + payload.userId + '&exam_id=' + payload.examId)
        .then(res => {
          // console.log('Component mountvvvvmmmm.');
          console.log(res.data.data);
          store.commit('updateResults', res.data.data);

        })
        .then(err => console.log(err))

    },


  }

})
if (window.processedData) {
  // console.log(window.processedData);
  // console.log(JSON.stringify(window.processedData) + "cdscdscdsdcdcdddddvv");
  store.commit('setUserToken', window.processedData.token);
  store.commit('setUserIdNumber', window.processedData.id);
  store.commit('setProcessedData', window.processedData);
}
const app = new Vue({
  i18n,
  el: '#app',
  router,
  store: store,
});










// const app = new Vue({
//     el: '#app',
// });
