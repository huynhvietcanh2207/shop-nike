<template>
  <!-- <HeaderView/> -->
    <h4 class="text-center" style="font-size: 1.5em; font-weight: bold;">Quản lý sản phẩm</h4>
    <div class="container">
   
      <!-- dssp có action 3 -->
      <!-- <a href="../app/"></a> -->
       <!-- <button class="btn"><router-link style="text-decoration: none; color: white; font-weight: bold;" to="/AddProduct">Add</router-link> </button>
       <button>Update</button>
       <button>Delete</button> -->
       <section class="section-nike">
     
      <!-- product -->
      <div class="shoes">
        <div class="container" style="margin-block: 60px">
          <div class="row">
            <div
              v-for="product in products"
              :key="product.id"
              class="col-md-3 col-sm-6 col-12 d-flex justify-content-center list-product"
            >
              <div class="p-5 text-light">
                <div class="shoe-nike">
                  <a class="icon-shoe" href="">
                    <img
                      src="https://img.icons8.com/laces/64/4D4D4D/trainers.png"
                      alt="trainers"
                    />
                  </a>

                  <div class="name"><h2>{{ product.name }}</h2></div>
                  <div class="year">{{ new Date().getFullYear() }}</div>
                  <div class="image">
                    <a href="">
                      <img
                        :src="product.image"
                        class="img img-fluid"
                        :alt="product.name"
                      />
                    </a>
                  </div>
                  <div class="footshoe">
                    <span><sup>$</sup>{{ product.price }}</span>
                    <span>
                      <a href="" id="icon-next">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </span>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-9 col-12">
                          <span>
                            <i class="bi bi-eye-fill"></i>
                          </span>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                          <button class="tn badge text-bg-secondary">
                            <i class="bi bi-heart"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <a href="#" class="btn-animation">
                      <div class="text">BUY</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   </div>
       <!-- <FooterView/> -->
  </template>
  
  <script>
  
  import axios from "axios";
// import HeaderView from './views/Header.vue';
// import FooterView from './views/Footer.vue';
import HeaderView from "@/views/Header.vue";
import FooterView from "@/views/Footer.vue";

export default {
  name: "ProductManagement",
  components: {
    HeaderView,
    FooterView,
  },
  data() {
    return {
      products: [], // Khai báo mảng products trong data
    };
  },
  methods: {
    showImage(event) {
      const small = event.target;
      const full = document.getElementById("imagebox");
      if (full) {
        full.src = small.src;
      }
    },
  },
  mounted() {
    axios
      .get("http://localhost/shop-nike/src/app/api/api.php/products")
      .then((response) => {
        this.products = response.data;
      })
      .catch((error) => {
        console.error("There was an error!", error);
      });
  },
};
  </script>
  
  <!-- <style scoped>
  /* CSS cho App.vue */
  @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");


  .btn {
  color: purple;
  text-transform: uppercase;
  text-decoration: none;
  border: 2px solid purple;
  padding: 10px 20px;
  font-size: 17px;
  font-weight: bold;
  background: transparent;
  position: relative;
  transition: all 1s;
  overflow: hidden;
}

.btn:hover {
  color: white;
}

.btn::before {
  content: '';
  position: absolute;
  height: 100%;
  width: 0%;
  top: 0;
  left: -40px;
  transform: skewX(45deg);
  background-color: purple;
  z-index: -1;
  transition: all 1s;
}

.btn:hover::before {
  width: 160%;
}

  </style>
   -->