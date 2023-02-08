import axios from 'axios';
<template>
    <section class="container">
        <div v-if="teacher_edit">
            <h2>Edit teacher:  {{ teacher_edit.name }}</h2> 
            <form class="mt-5" method="post" v-on:submit.prevent="update()">
                <div>
                    <label class='form-label'>Nombre:</label>
                    <input v-model="teacher_edit.name" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Email:</label>
                    <input v-model="teacher_edit.email" class='form-control' type="email">
                </div>
                <div>
                    <label class='form-label'>Addres:</label>
                    <input v-model="teacher_edit.address" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Phone:</label>
                    <input v-model="teacher_edit.phone" class='form-control' type="tel">
                </div>
                <div>
                    <label class='form-label'>City:</label>
                    <input v-model="teacher_edit.city" class='form-control' type="text">
                </div>
                <br>
                <input @click="update()" class="btn btn-warning " type="submit" value="Update!">
            </form>
            <input @click="close()" class="btn btn-danger btn-delete" type="submit" value="Close">
        </div>
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
            teachers: [],
            teacher_edit: null
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
        edit(id){
            axios.get(`/teacher/edit/${id}`).then(res=>{
                console.log(res.data);
                this.teacher_edit = res.data
            }).catch(err=>{
                console.log(err);
            })
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
        },
        close(){
            this.teacher_edit = null
        }
    }
}
</script>
