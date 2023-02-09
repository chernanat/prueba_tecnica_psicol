<template>
    <section>
        <FormStudentVue></FormStudentVue>
        <TableStudent></TableStudent>
        <FooterVue></FooterVue>
    </section>
</template>
<script>
import FooterVue from '../../Layouts/Footer.vue';
import FormStudentVue from './FormStudent.vue';
import TableStudent from './TableStudent.vue';

export default {
    components:{
        FooterVue,
        FormStudentVue,
        TableStudent
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
