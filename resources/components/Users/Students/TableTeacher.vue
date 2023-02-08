<template>
    <section class="container">
        <div v-if="student_edit">
            <h3>Edit Student:  {{ student_edit.name }}</h3> 
            <form class="" method="post" v-on:submit.prevent="update(student_edit.id)">
                <div>
                    <label class='form-label'>Nombre:</label>
                    <input v-model="student_edit.name" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Email:</label>
                    <input v-model="student_edit.email" class='form-control' type="email">
                </div>
                <div>
                    <label class='form-label'>Addres:</label>
                    <input v-model="student_edit.address" class='form-control' type="text">
                </div>
                <div>
                    <label class='form-label'>Phone:</label>
                    <input v-model="student_edit.phone" class='form-control' type="tel">
                </div>
                <div>
                    <label class='form-label'>City:</label>
                    <input v-model="student_edit.city" class='form-control' type="text">
                </div>
                <br>
                <div class="d-grid gap-2 d-flex justify-content-center justify-content-center">
                    <input @click="update()" class="btn btn-success " type="submit" value="Update!">
                    <input @click="close()" class="btn btn-danger btn-delete" type="submit" value="Cancel">
                </div>
            </form>
        </div>
        <div v-if="students[0]">
            <h2>Editar/Eliminar Student</h2>
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
                    <tr class="table-primary" v-for="(student,index) in students" :key="index">
                        <td>{{student.name}}</td>
                        <td>{{student.email}}</td>
                        <td>{{student.phone}}</td>
                        <td>{{student.address}}</td>
                        <td>                  
                            <input @click="edit(student.id)" class="btn btn-warning " type="submit" value="Edit">
                            <input @click="del(student.id)" class="btn btn-danger btn-delete" type="submit" value="Delete">
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
        this.getStudents()
    },
    data(){
        return{
            students: [],
            student_edit: null
        }
      },
    methods:{
        getStudents(){
            axios.get('/getstudents').then(res=>{
                this.students = res.data
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
            axios.get(`/student/edit/${id}`).then(res=>{
                console.log(res.data);
                this.student_edit = res.data
            }).catch(err=>{
                console.log(err);
            })
        },
        update(id){
            axios.post(`/student/edit/${id}`,this.student_edit).then(res=>{
                Swal.fire('Success!', 'Student Updated Succesfully!','success')
                this.getStudents()
            }).catch(err=>{
                console.log(err);
            })
        },
        del(id){
            axios.get(`/delete/${id}`).then(res=>{
                Swal.fire('Success!', 'Student Deleted Succesfully!','success')
                this.getStudents()
            }).catch(err=>{
                console.log(err);
            })
        },
        close(){
            this.student_edit = null
        }
    }
}
</script>
