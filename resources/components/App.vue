<template>
    <section>
        <NavVue></NavVue>
        <section class="container">
            <h1>Reportes</h1>
            <div v-for="user in users">
                <div v-if="user.role == 'student'">
                    <h3>Estudiante: {{ user.name }}</h3>
                    <h3>Asignaturas:</h3>
                    <h3>Profesores:</h3>
                </div>
            </div>
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
            auth:{
                user_id: ''
            },
            users:{}
        }
    },
    mounted(){
        Auth.initialize()
        this.auth.user_id = Auth.data.id
        this.validateLogin()
    },  
    created(){
        this.getUsers();
    },
    methods:{
        validateLogin(){
            if(this.auth.user_id){
                
            }else{
                window.location.href = "/"
            }
        },
        getUsers(){
            axios.get('/getusers').then(res=>{
                this.users = res.data
            }).catch(err=>{
                console.log(err);
            })
        }
    }
}
</script>