<template>
    <div>
        <div class="row">
            <router-link to="store-employee" class="btn btn-primary">Add Employee</router-link>
        </div>
        <br><br>
        
 <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Joining Date</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr v-for="employee in employees" :key="employee.id">
                        <td>{{employee.name}}</td>
                        <td><img :src="employee.photo" alt="" id="em_photo"></td>
                        <td>{{employee.phone}}</td>
                        <td>{{employee.salary}}</td>
                        <td>{{employee.joining_date}}</td>
                        <td><a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>



    </div>
</template>

<script>
export default{

created(){

  //Checks whether user has logged in when page is loaded
  if (!User.loggedIn()) {
    this.$router.push({name:'/home'})
  }
},
data(){
  return {
    employees:[]
  }
},
methods:{
    allemployee(){
      axios.get('./api/employeee')
      .then(({data}) => (this.employees = data))
      .catch()
    }
},
created(){
  this.allemployee();
}
}
</script>

<style scoped>
#em_photo{
  width: 50px;
  height: 50px;
}
</style>
