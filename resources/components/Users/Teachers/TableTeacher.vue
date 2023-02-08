import axios from 'axios';
<template>
    <section class="container">
        <div v-if="teachers[0]">
            <h2>Editar/Eliminar Profesor</h2>
            <table class="table table-hover" id="test">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="table-primary" v-for="(teacher,index) in teachers" :key="index">
                        <td>{{teacher.name}}</td>
                        <td>{{teacher.email}}</td>
                        <td>{{teacher.phone}}</td>
                        <td>{{teacher.address}}</td>
                        <td>                  
                            <input @click="edit(teacher.id)" class="btn btn-warning " type="submit" value="Edit">
                            <input @click="del(teacher.id)" class="btn btn-danger btn-delete" type="submit" value="Delete">
                        </td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </section>
</template>
<script>


export default {
    components:{
   },
   mounted(){
        this.getTeachers()
    },
    data(){
        return{
            teachers: []
        }
      },
    methods:{
        getTeachers(){
            axios.get('/getteachers').then(res=>{
                this.teachers = res.data
            }).catch(err=>{
                console.log(err);
            })
        },
        table(){
            this.$nextTick(()=>{
                $('#test').DataTable()
            });
        },
        edit(){

        },
        update(){

        },
        del(id){
            axios.get(`/delete/${id}`).then(res=>{
                Swal.fire('Success!', 'Teacher Deleted Succesfully!','success')
                this.getTeachers()
            }).catch(err=>{
                console.log(err);
            })
        }
    }
}
</script>
