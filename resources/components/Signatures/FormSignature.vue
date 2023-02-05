<template>
    <section>
        <NavVue></NavVue>
        <section class="container">
            <h2 class="mt-2 text-center">Registro de Asignaturas</h2>
            <form class="mt-5" method="post" v-on:submit.prevent="save()">
                <div>
                    <label class='form-label'>Nombre:</label>
                    <input v-model="signature.name" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Descripcion:</label>
                    <input v-model="signature.description" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Creditos:</label>
                    <input v-model="signature.credits" class='form-control' type="number">
                </div>
                <div>
                    <label class='form-label'>Area de conocimiento:</label>
                    <input v-model="signature.area" class='form-control' type="text">
                </div>
                <div>
                    <label class="form-label" for="">Seleccione una opcion:</label>
                    <select class="form-control" name="" id="" v-model="signature.dependency">
                        <option value="electiva">Electiva</option>
                        <option value="obligatoria">Obligatoria</option>
                    </select>
                </div>
                <br>
                <div class="d-grid gap-2 text-center">
                    <input class="btn btn-success" type="submit" value="Register">
                </div>
            </form>
        </section>
        <br>
        <FooterVue></FooterVue>
    </section>
</template>

<script>
import Auth from '../helpers/auth';
import NavVue from '../Layouts/Nav.vue';
import FooterVue from '../Layouts/Footer.vue';

export default {
    components:{
        NavVue,
        FooterVue
    },
    data(){
        return{
            signature:{},
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
            axios.post('/signature/save',this.signature).then(res => {
                console.log(this.signature);
                if(res.data.saved){
                    window.location.href = '/'
                }
            }
            ).catch(err => {
                console.log(err);         
            });
        },
        validateLogin(){
            if(this.auth.user_id){
 
            }
            else{
                window.location.href = "/home"
            }
        }

    }
}
</script>