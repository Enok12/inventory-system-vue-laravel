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
                  <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
                  <a class="btn btn-sm btn-info" href="">Add Customer</a>
                </div>
               


                <div class="table-responsive" style="font-size:12px;">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="#">RA0449</a></td>
                        <td>Udin Wayang</td>
                        <td>Nasi Padang</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">X</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-tems-center">Total Quantity:
                            <strong>67</strong>
                        </li>
                         <li class="list-group-item d-flex justify-content-between align-tems-center">Sub Total:
                            <strong>$ 23423</strong>
                        </li>
                         <li class="list-group-item d-flex justify-content-between align-tems-center">VAT :
                            <strong>67</strong>
                        </li>
                         <li class="list-group-item d-flex justify-content-between align-tems-center">Total Amount:
                            <strong>632427</strong>
                        </li>
                    </ul>
                    <br>

                    <form>
                        <label for="">Customer Name</label>
                        <select class="form-control" v-model="customer_id">
                            <option value="" v-for="customer in customers" :key="customer.id">{{ customer.name }}</option>
                        </select>

                        <label for="">Pay</label>
                        <input type="text" class="form-control" required="" v-model="pay">

                        <label for="">Due</label>
                        <input type="text" class="form-control" required="" v-model="due">

                        <label for="">Pay by</label>
                        <select class="form-control" v-model="customer_id">
                            <option value="Cash">Cash</option>
                            <option value="Chequeu">Chequeu</option>
                            <option value="Gift_Card">Gift Card</option>
                        </select>

                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>




              </div>
            </div>


            <!-- Pie Chart -->
            <div class="col-xl-7 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                 
                </div>

                <!-- CATEGORY WISE PRODUCTS -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Products</a>
                    </li>
                    <li class="nav-item" v-for="category in categories" :key="category.id">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subproduct(category.id)">{{category.category_name}}</a>
                    </li>
                  
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <!-- All products Tab  -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                                <input type="text" class="form-control" v-model="searchTerm" style="width:100% ;" placeholder="Search Product">
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in filtersearch" :key="product.id">
                                        <a href="#">
                                        <div class="card" style="width: 8.5rem;">
                                            <img class="card-img-top" :src="product.image" id="em_photo">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ product.product_name }}</h6>
                                                    <span class="badge badge-success" v-if="product.product_quantity >= 1">{{ product.product_quantity }} Available </span>
                                                    <span v-else class="badge badge-danger">Stock Out</span>
                                                </div>
                                        </div></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab All Products -->


                       
                       <!-- Sub Cageries -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="card-body">
                                 <input type="text" class="form-control" v-model="searchTerm2" style="width:100% ;" placeholder="Search Product">
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="getproducts in getfiltersearch" :key="getproducts.id">
                                        <a href="#">
                                        <div class="card" style="width: 8.5rem;">
                                            <img class="card-img-top" :src="getproducts.image" id="em_photo">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ getproducts.product_name }}</h6>
                                                    <span class="badge badge-success" v-if="getproducts.product_quantity >= 1">{{ getproducts.product_quantity }} Available </span>
                                                    <span v-else class="badge badge-danger">Stock Out</span>
                                                </div>
                                        </div></a>
                                    </div>
                                </div>
                                </div> 
                                </div> 
                                <!-- End Subcategories -->
                    
                    
                    </div>
                    <!-- End All products  -->
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
  this.allCategories();
  this.allCustomers();
},

data(){
  return {
    products:[],
    categories:'',
    getproducts:[],
    searchTerm:'',
    searchTerm2:'',
    customers:'',
    error:''
  }
},

computed:{
  //Search
  filtersearch(){
    return this.products.filter(product => {
      return product.product_name.match(this.searchTerm)
    })
  },
  getfiltersearch(){
    return this.getproducts.filter(getproduct => {
      return getproduct.product_name.match(this.searchTerm2)
    })
  },
},
methods:{
    allProducts(){
      axios.get('./api/product')
      .then(({data}) => (this.products = data))
      .catch()
    },
    allCategories(){
      axios.get('./api/category')
      .then(({data}) => (this.categories = data))
      .catch()
    },
     subproduct(id){
      axios.get('./api/getting/product/'+id)
      .then(({data}) => (this.getproducts = data))
      .catch()
    }, 
    allCustomers(){
      axios.get('./api/customer')
      .then(({data}) => (this.customers = data))
      .catch()
    },
}

}
</script>

<style scoped>
#em_photo{
  width: 135px;
  height: 135px;
}
</style>
