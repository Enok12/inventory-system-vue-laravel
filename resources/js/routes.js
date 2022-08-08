let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let home = require('./components/home.vue').default;
let logout = require('./components/auth/logout.vue').default;

//EMPLOYEE COMPONENTS
let storeemployee = require('./components/employee/create.vue').default;
let employee = require('./components/employee/index.vue').default;
let editemployee = require('./components/employee/edit.vue').default;



export const routes = [
    { path: '/', component: login, name:'/' },
    { path: '/register', component: register,name:'/register' },
    { path: '/forget', component: forget,name:'/forget' },
    { path: '/home', component: home,name:'/home' },
    { path: '/logout', component: logout,name:'/logout' },

    //Employee Module
    { path: '/store-employee', component: storeemployee,name:'store-employee' },
    { path: '/employee', component: employee,name:'employee' },
    { path: '/edit-employee/:id', component: editemployee,name:'edit-employee' },

  ]