<template>
    <div>
        
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">POS</li>
            </ol>
          </div>

          <div class="row mb-3">


            <!-- Area Chart -->
            <div class="col-xl-5 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Monthly Recap Report</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    asdaasdasdasdasdas
                  </div>
                </div>
              </div>
            </div>


            <!-- Pie Chart -->
            <div class="col-xl-7 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                 
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in filtersearch" :key="product.id">
                            <div class="card" style="width: 8.5rem;">
                                <img class="card-img-top" :src="product.image" id="em_photo">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ product.product_name }}</h5>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

              </div>
            </div>


          </div>
          <!--Row-->

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

created(){
  this.allProducts();
},

data(){
  return {
    products:[],
    searchTerm:''
  }
},

computed:{
  //Search
  filtersearch(){
    return this.products.filter(product => {
      return product.product_name.match(this.searchTerm)
    })
  }
},
methods:{
    allProducts(){
      axios.get('./api/product')
      .then(({data}) => (this.products = data))
      .catch()
    },
}

}
</script>

<style scoped>
#em_photo{
  width: 50px;
  height: 50px;
}
</style>
