<template>
    <section>
        <NavVue></NavVue>
        <section class="container">
            <h2 class="mt-2 text-center">Registro de Estudiantes</h2>
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
                    <label class='form-label'>City:</label>
                    <input v-model="user.city" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Phone:</label>
                    <input v-model="user.phone" class='form-control' type="tel">
                </div>
                <div>
                    <label class='form-label'>Semester:</label>
                    <input v-model="user.semester" class='form-control' type="number">
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
import FooterVue from '../../Layouts/Footer.vue';

export default {
    components:{
        NavVue,
        FooterVue
    },
    data(){
        return{
            user:{
                role: 'student'
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
                console.log(this.user);
                if(res.data.saved){
                    Swal.fire('Success!', 'Student Saved Succesfully!','success')
                    this.$parent.test();
                    this.user = {}
                    this.user.role = 'student'
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