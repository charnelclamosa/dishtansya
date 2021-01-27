import Vue from 'vue'
import VueRouter from 'vue-router'
// import store from './store'
import Home from './../views/pages/TheHome'
import Login from './../views/pages/TheLogin'
import Register from './../views/pages/Register'


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: '/login'
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },,
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/home',
            name: 'home',
            component: Home
        }
    ]
})

export default router