<template>
    <div>
        <div class="row">
            <router-link to="given-salary" class="btn btn-primary">Pay Salary</router-link>
        </div>
        <br>
        <input type="text" class="form-control" v-model="searchTerm" style="width:300px;" placeholder="search">
        <br>
        
 <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Salary Details</h6>
                </div>
                <div class="alert alert-danger" v-cloak v-if="filtersearch.length === 0">
                  No Data Found
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Month Nmae</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr v-for="salary in filtersearch" :key="salary.id">
                        <td>{{salary.salary_month}}</td>
                        <td>   <router-link :to="{name: 'view-salary', params:{id:salary.salary_month}}" class="btn btn-sm btn-primary">View Salary</router-link>

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
    salaries:[],
    searchTerm:''
  }
},

computed:{
  //Search
  filtersearch(){
    return this.salaries.filter(salary => {
      return salary.salary_month.match(this.searchTerm)
    })
  }
},
methods:{
    allSalary(){
      axios.get('./api/salary/')
      .then(({data}) => (this.salaries = data))
      .catch()
    },
 
},
created(){
  this.allSalary();
}
}
</script>

<style scoped>
#em_photo{
  width: 50px;
  height: 50px;
}
</style>
