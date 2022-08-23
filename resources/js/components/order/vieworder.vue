

<template>
  
  <div>

 <div class="row">
  <router-link to="/order" class="btn btn-primary">Go back </router-link>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">

              <div class="col-lg-6">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Order Details</h1>
                  </div>

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
                      
                      <!-- <tr v-for="order in filtersearch" :key="order.id">
                        <td>{{order.name}}</td>
                        <td>{{order.total}}</td>
                        <td>{{order.pay}}</td>
                        <td>{{order.due}}</td>
                        <td>{{order.payby}}</td>
                        <td>   <router-link :to="{name: 'view-order', params:{id:order.id}}" class="btn btn-sm btn-primary">View</router-link>

                        </td>
                      </tr> -->
                    
                    </tbody>
                  </table>


                  <hr>
                  <div class="text-center">
  
  
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Order Details</h1>
                  </div>

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
                      
                      <!-- <tr v-for="order in filtersearch" :key="order.id">
                        <td>{{order.name}}</td>
                        <td>{{order.total}}</td>
                        <td>{{order.pay}}</td>
                        <td>{{order.due}}</td>
                        <td>{{order.payby}}</td>
                        <td>   <router-link :to="{name: 'view-order', params:{id:order.id}}" class="btn btn-sm btn-primary">View</router-link>

                        </td>
                      </tr> -->
                    
                    </tbody>
                  </table>


                  <hr>
                  <div class="text-center">
  
  
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>

               <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Order Details</h1>
                  </div>

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
                      
                      <!-- <tr v-for="order in filtersearch" :key="order.id">
                        <td>{{order.name}}</td>
                        <td>{{order.total}}</td>
                        <td>{{order.pay}}</td>
                        <td>{{order.due}}</td>
                        <td>{{order.payby}}</td>
                        <td>   <router-link :to="{name: 'view-order', params:{id:order.id}}" class="btn btn-sm btn-primary">View</router-link>

                        </td>
                      </tr> -->
                    
                    </tbody>
                  </table>


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



<script type="text/javascript">
  
  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
    
      errors:{},
      orders:{},
      details:{}
    }
  },

  created(){
    
    let id = this.$route.params.id
    
  	axios.get('/api/order/details/'+id)
  	.then(({data}) => (this.orders = data))
  	.catch(console.log('error'))

    axios.get('/api/order/orderdetails/'+id)
  	.then(({data}) => (this.details = data))
  	.catch(console.log('error'))
  },

  methods:{
    
  },

  }
   
</script>


<style type="text/css">
  
</style>