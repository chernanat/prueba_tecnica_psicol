<template>
    <section>
        <FormStudentVue></FormStudentVue>
    </section>
</template>
<script>
import FooterVue from '../../Layouts/Footer.vue';
import NavVue from '../../Layouts/Nav.vue';
import FormStudentVue from './FormStudent.vue';

export default {
    components:{
        NavVue,
        FooterVue,
        FormStudentVue
   },
   mounted(){

    },
    data(){
        return{

          }
      },
    methods:{

      }
}
</script>
