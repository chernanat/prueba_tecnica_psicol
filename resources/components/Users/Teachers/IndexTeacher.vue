<template>
    <section>
        <FormTeacherVue></FormTeacherVue>
        <TableTeacher></TableTeacher>
        <FooterVue></FooterVue>
    </section>
</template>
<script>
import FooterVue from '../../Layouts/Footer.vue';
import NavVue from '../../Layouts/Nav.vue';
import FormTeacherVue from './FormTeacher.vue';
import TableTeacher from './TableTeacher.vue';

export default {
    components:{
        NavVue,
        FooterVue,
        FormTeacherVue,
        TableTeacher
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
