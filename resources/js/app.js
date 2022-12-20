import './bootstrap';

import swal from 'sweetalert2';
window.Swal = swal;

import Vue from 'vue'

import HomeIndex from '../components/App.vue';
import NavVue from '../components/Layouts/Nav.vue'
import FooterVue from '../components/Layouts/Footer.vue'
import LoginUser from '../components/Login/Login.vue'
import RegisterUser from '../components/Login/Register.vue'
import FormSignature from '../components/Signatures/FormSignature.vue'
import FormStudent from '../components/Users/Students/FormStudent.vue'
import IndexTeacher from '../components/Users/Teachers/IndexTeacher.vue'
import IndexSignature from '../components/Signatures/IndexSignature.vue'
import IndexStudent from '../components/Users/Students/IndexStudent.vue'


// import los componentes

new Vue({
    el: '#app',
    components:{
        HomeIndex,
        NavVue,
        FooterVue,
        LoginUser,
        RegisterUser,
        FormSignature,
        FormStudent,
        IndexStudent,
        IndexSignature,
        IndexTeacher
    }
})
