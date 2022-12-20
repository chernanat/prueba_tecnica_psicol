<template>
    <section>
        <NavVue></NavVue>
        <section class="container">
            <h1>Reportes</h1>
        </section>
        <FooterVue></FooterVue>
    </section>
</template>
<script>
import axios from 'axios';
import NavVue from './Layouts/Nav.vue';
import FooterVue from './Layouts/Footer.vue';
import Auth from './helpers/auth'

export default {
    components:{
        NavVue,
        FooterVue
    },
    data(){
        return{
        }
    },
    mounted(){
    },  
    created(){
    },
    methods:{
    }
}
</script>