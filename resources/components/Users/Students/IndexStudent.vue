<template>
    <section>
        <FormStudentVue></FormStudentVue>
        <TableStudent v-if='load'></TableStudent>
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
            load: true
          }
      },
    methods:{
        test(){
            this.load = false
            setTimeout(() => {
                this.load = true;
            }, 100);
        }
      }
}
</script>
