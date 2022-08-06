<template>
    <div>
        <div class="row">
            <router-link to="" class="btn btn-primary">All Employee</router-link>
        </div>
        <div class="row justify-content-center">
             
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Employee</h1>
                  </div>
                  <form class="user"  @submit.prevent = "employeeinsert" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter You Full Name" v-model="form.name">
                             <small class="text-danger" v-if="errors.email">{{ errors.name[0]}}</small>
                            </div>
                             <div class="col-md-6">
                                 <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Email Address" v-model="form.email">
                                     <small class="text-danger" v-if="errors.email">{{ errors.email[0]}}</small>
                            </div>


                        </div>
                    </div>

                       <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter You Address" v-model="form.address">
                             <small class="text-danger" v-if="errors.address">{{ errors.address[0]}}</small>
                            </div>
                             <div class="col-md-6">
                                 <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Your Salary" v-model="form.salary">
                                     <small class="text-danger" v-if="errors.salary">{{ errors.salary[0]}}</small>
                            </div>


                        </div>
                    </div>

                     <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="exampleInputFirstName" placeholder="Enter Joining Date" v-model="form.joining_date">
                             <small class="text-danger" v-if="errors.joining_date">{{ errors.joining_date[0]}}</small>
                            </div>
                             <div class="col-md-6">
                                 <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Your NID" v-model="form.nid">
                                     <small class="text-danger" v-if="errors.nid">{{ errors.nid[0]}}</small>
                            </div>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Phone Number" v-model="form.phone">
                             <small class="text-danger" v-if="errors.photo">{{ errors.photo[0]}}</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                <small class="text-danger" v-if="errors.photo">{{ errors.photo[0]}}</small>
                                </div>
                             </div>

                            <div class="col-md-6">
                                <img src="form.photo" alt="" style="height40px; width:50px;">
                            </div>
                        </div>
                       
                      
                    </div>

                    
                   
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
    


                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  return{
    form:{
      name :null,
      email:null,
      address :null,
      phone :null,
      salary :null,
      address :null,
      photo: null,
      nid :null,
      joining_date: null
    },
    errors:{

    }
  }
},
methods:{
    employeeinsert(){

    }
}
}
</script>

<style scoped>

</style>
