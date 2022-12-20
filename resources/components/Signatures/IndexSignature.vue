<template>
    <section>
        <FormSignatureVue></FormSignatureVue>
    </section>
</template>
<script>
import FooterVue from '../Layouts/Footer.vue';
import NavVue from '../Layouts/Nav.vue'
import FormSignatureVue from './FormSignature.vue';

export default {
    components:{
        NavVue,
        FooterVue,
        FormSignatureVue
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
