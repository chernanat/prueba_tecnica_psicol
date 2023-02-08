<template>
    <section>
        <FormTeacherVue></FormTeacherVue>
        <TableTeacher v-if="load"></TableTeacher>
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
