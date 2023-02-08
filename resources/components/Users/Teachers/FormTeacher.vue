<template>
    <section>
        <NavVue></NavVue>
        <section class="container">
            <h2 class="mt-2 text-center">Registro de Profesores</h2>
            <form class="mt-5" method="post" v-on:submit.prevent="save()">
                <div>
                    <label class='form-label'>Nombre:</label>
                    <input v-model="user.name" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Email:</label>
                    <input v-model="user.email" class='form-control' type="email">
                </div>
                <div>
                    <label class='form-label'>Addres:</label>
                    <input v-model="user.address" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Phone:</label>
                    <input v-model="user.phone" class='form-control' type="tel">
                </div>
                <div>
                    <label class='form-label'>City:</label>
                    <input v-model="user.city" class='form-control' type="text">
                </div>
                <br>
                <div class="d-grid gap-2 text-center">
                    <input class="btn btn-success" type="submit" value="Register">
                </div>
            </form>
        </section>
        <br>
    </section>
</template>

<script>
import Auth from '../../helpers/auth';
import NavVue from '../../Layouts/Nav.vue';
import TableTeacher from './TableTeacher.vue';

export default {
    components:{
        NavVue,
        TableTeacher
    },
    data(){
        return{
            user:{
                role: 'teacher'
            },
            auth:{
                user_id: ''
            }
        }
    },
    mounted(){
        Auth.initialize()
        this.auth.user_id = Auth.data.id
        this.validateLogin()
    },  
    methods:{
        save(){
            axios.post('/save',this.user).then(res => {
                if(res.data.saved){
                    this.$parent.test();
                    this.user = {}
                    Swal.fire('Success!', 'Teacher Saved Succesfully!','success')
                    this.user.role = 'teacher'
                }
            }
            ).catch(err => {
                console.log(err);
                if(err.response.status == 422){
                    Swal.fire('Ops!', err.response.data.message,'error')
                }
                if(err.response.status == 500){
                    Swal.fire('Error!', 'This Email Already exists!','error')
                }            
            });
        },
        validateLogin(){
            if(this.auth.user_id){
                
            }else{
                window.location.href = "/home"
            }
        }
    }
}
</script>