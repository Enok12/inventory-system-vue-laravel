<template>
    <div>
        <input type="text" class="form-control" v-model="searchTerm" style="width:300px;" placeholder="search">
        <br>
        
 <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Today Order</h6>
                </div>
                <div class="alert alert-danger" v-cloak v-if="filtersearch.length === 0">
                  No Data Found
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th> Customer Name</th>
                        <th> Total Amount</th>
                        <th> Pay</th>
                        <th> Due</th>
                        <th> Pay By</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr v-for="order in filtersearch" :key="order.id">
                        <td>{{order.name}}</td>
                        <td>{{order.total}}</td>
                        <td>{{order.pay}}</td>
                        <td>{{order.due}}</td>
                        <td>{{order.payby}}</td>
                        <td>   <router-link :to="{name: 'view-order', params:{id:order.id}}" class="btn btn-sm btn-primary">View</router-link>

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
    orders:[],
    searchTerm:''
  }
},

computed:{
  //Search
  filtersearch(){
    return this.orders.filter(order => {
      return order.name.match(this.searchTerm)
    })
  }
},
methods:{
    allorder(){
      axios.get('./api/order')
      .then(({data}) => (this.orders = data))
      .catch()
    },
},
created(){
  this.allorder();
}
}
</script>

<style scoped>
#em_photo{
  width: 50px;
  height: 50px;
}
</style>
