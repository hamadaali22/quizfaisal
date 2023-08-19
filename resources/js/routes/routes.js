import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import ExampleComponent from '../components/ExampleComponent.vue'
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import Questions from '../components/Questions.vue'
import Home from '../components/Home.vue'
import Levels from '../components/Levels.vue'
import Exams from '../components/Exams.vue'

import Telcs from '../components/Telcs.vue'
import ExamsTelc from '../components/ExamsTelc.vue'

import SubQuestions from '../components/SubQuestions.vue'
import ImageProcessing from '../components/ImageProcessing.vue'
import Result from '../components/Result.vue'
import ForgetPassword from '../components/ForgetPassword.vue'

const routes = [
    { path: '/home', component: Home, name: 'Home' },
    { path: '/', component: Home, name: 'Home' },
    { path: '/levels', component: Levels, name: 'Levels' },
    // { path: '/exams', component: Exams, name: 'Exams' },
    { path: '/level/:id', component: Exams, name: 'Exams' },

    { path: '/telcs', component: Telcs, name: 'Telcs' },
    { path: '/telc/:id', component: ExamsTelc, name: 'ExamsTelc' },






    { path: '/login', component: Login, name: 'Login' },
    { path: '/register', component: Register, name: 'Register' },
    { path: '/forgetpassword', component: ForgetPassword, name: 'ForgetPassword' },
    { path: '/result', component: Result, name: 'Result' },

    // { path: '/quiz', component: Quiz, name: 'Quiz' },
    { path: '/exam/:id', component: Questions, name: 'Questions' },
    { path: '/examplecomponent', component: ExampleComponent, name: 'ExampleComponent' },
    { path: '/imageprocessing', component: ImageProcessing, name: 'ImageProcessing' },

];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history',
    base:'/'
})

export default router;
