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
                      <tr v-for="cart in carts" :key="cart.id">
                        <td><a href="#">{{ cart.pro_name }}</a></td>
                        <td>
                          <button class="btn btn-sm btn-success" @click.prevent="increment(cart.id)">+</button>
                          <input type="text" readonly :value="cart.pro_quantity" style="width:25px;">
                          <button class="btn btn-sm btn-danger" v-if="cart.pro_quantity >= 2" @click.prevent="decrement(cart.id)">-</button>
                          <button class="btn btn-sm btn-danger" v-else disabled>-</button>
                          </td>
                        <td>{{ cart.product_price }}</td>
                        <td>{{ cart.subtotal }}</td>
                        <td><a @click="removeitem(cart.id)" class="btn btn-sm btn-primary">X</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-tems-center">Total Quantity:
                            <strong>{{ qty }}</strong>
                        </li>
                         <li class="list-group-item d-flex justify-content-between align-tems-center">Sub Total:
                            <strong>Rs {{subtotal}}</strong>
                        </li>
                         <li class="list-group-item d-flex justify-content-between align-tems-center">VAT :
                            <strong>{{ vats.vat }} %</strong>
                        </li>
                         <li class="list-group-item d-flex justify-content-between align-tems-center">Total Amount:
                            <strong>Rs {{(subtotal * (vats.vat/100)) + subtotal}}</strong>
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
                                        <button class="btn btn-sm" @click.prevent = "AddtoCart(product.id)">
                                        <div class="card" style="width: 8.5rem;">
                                            <img class="card-img-top" :src="product.image" id="em_photo">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ product.product_name }}</h6>
                                                    <span class="badge badge-success" v-if="product.product_quantity >= 1">{{ product.product_quantity }} Available </span>
                                                    <span v-else class="badge badge-danger">Stock Out</span>
                                                </div>
                                        </div></button>
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
                                        <button class="btn btn-sm" @click.prevent = "AddtoCart(getproducts.id)">
                                        <div class="card" style="width: 8.5rem;">
                                            <img class="card-img-top" :src="getproducts.image" id="em_photo">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ getproducts.product_name }}</h6>
                                                    <span class="badge badge-success" v-if="getproducts.product_quantity >= 1">{{ getproducts.product_quantity }} Available </span>
                                                    <span v-else class="badge badge-danger">Stock Out</span>
                                                </div>
                                        </div></button>
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
  this.cartProduct();
   this.vat();

  //Used to update the table while adding products
  Reload.$on('AfterAdd',()=>{
    this.cartProduct()
  });
},

data(){
  return {
    products:[],
    categories:'',
    getproducts:[],
    searchTerm:'',
    searchTerm2:'',
    customers:'',
    error:'',
    carts:[],
    vats:''
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

  //Total Quantity
  qty(){
     let sum = 0;
     for(let i=0; i<this.carts.length;i++){
      sum += (parseFloat(this.carts[i].pro_quantity))
     }
     return sum;
  },

  //Sub Total
  subtotal(){
     let sum = 0;
     for(let i=0; i<this.carts.length;i++){
      sum += (parseFloat(this.carts[i].pro_quantity * this.carts[i].product_price))
     }
     return sum;
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

    //Cart methods
    AddtoCart(id){
       axios.get('./api/addToCart/'+id)
      .then(() => {
        Reload.$emit('AfterAdd');
        Notification.cart_success();
      })
      .catch()
    },

  //Dsiplay on table
    cartProduct(){
      axios.get('./api/cart/product/')
      .then(({data}) => (this.carts = data))
      .catch()
    },

    //Remove Cart Item
    removeitem(id){
     axios.get('./api/remove/cart/'+id)
      .then(() => {
        Reload.$emit('AfterAdd');
        Notification.cart_delete();
      })
      .catch()
    },
    increment(id){
       axios.get('./api/increment/'+id)
      .then(() => {
        Reload.$emit('AfterAdd');
      })
    },
    decrement(id){
      axios.get('./api/decrement/'+id)
      .then(() => {
        Reload.$emit('AfterAdd');
      })
    },

    vat(){
      axios.get('./api/vats/')
      .then(({data}) => (this.vats = data))
      .catch()
    }
    //End Cart Methods
}

}
</script>

<style scoped>
#em_photo{
  width: 135px;
  height: 135px;
}
</style>
