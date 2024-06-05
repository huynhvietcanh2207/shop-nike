<template>
  <div class="home">
    <HeaderView />

    <!-- Header -->
    <header>
      <div id="textbanner">
        <p id="textbn1">Lifestyle Running Shoes</p>

        <h1>EXTRA<span> ORDINARY</span></h1>
      </div>
      <div class="banner">
        <div id="bannercha">
          <img src="/image/banner.jpg" alt="bannercha" />
        </div>
        <div id="bannercon">
          <img src="/image/banner.jpg" alt="" />
        </div>
      </div>
    </header>

    <!-- buton 3d -->
    <div class="btn-3d">
      <a href="#">
        <span style="font-size: 0.8em; font-weight: bold" class="front">SHOP NOW</span>
        <span style="font-size: 0.8em; font-weight: bold" class="top">SHOP NOW</span>
      </a>
    </div>

    <!-- Section -->
    <section class="section-nike">
      <div class="section-font">
        <h1>Tame the Terrain<span></span></h1>

        <h1>NICE<span>ZEGAMA 2</span></h1>
      </div>

      <!-- <div class="gallery-container">
        <div class="gallery">
          <img src="/image/j-crew.jpg" class="photo" alt="" />
          <img src="/image/giay4.jpg" class="photo" alt="" />
          <img src="/image/WB257535_1_enlarged.webp" class="photo" alt="" />
          <img src="/image/adidas.jpg" class="photo" alt="" />
          <img src="/image/j-crew.jpg" class="photo" alt="" />
          <img src="/image/adidas.jpg" class="photo" alt="" />
          <img src="/image/WB257535_1_enlarged.webp" class="photo" alt="" />
          <img src="/image/adidas.jpg" class="photo" alt="" />
          <img src="/image/adidas.jpg" class="photo" alt="" />
        </div>
      </div> -->
      <div class="label-product">
        <h1><span>Product</span></h1>
      </div>
      <!-- product -->
      <div class="shoes">
        <div class="container" style="margin-block: 60px">
          <div class="row">
            <div v-for="product in products" :key="product.id"
              class="col-md-3 col-sm-6 col-12 d-flex justify-content-center list-product">
              <div class="p-5 text-light">
                <div class="shoe-nike">
                  <a class="icon-shoe" href="">
                    <img src="https://img.icons8.com/laces/64/4D4D4D/trainers.png" alt="trainers" />
                  </a>

                  <div class="name">
                    <h2>{{ product.name }}</h2>
                  </div>
                  <div class="year">{{ new Date().getFullYear() }}</div>
                  <div class="image">
                    <a href="">
                      <img :src="'/image/' + product.image" class="img img-fluid" :alt="product.name" />
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
                    <a href="#" class="btn-animation" @click.prevent="addToCart(product)">
                      <div class="text">Add Cart</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pagination -->
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item" :class="{ disabled: currentPage === 1 }">
            <a class="page-link" href="#" @click.prevent="changePage(currentPage - 1)">Previous</a>
          </li>
          <li class="page-item" v-for="page in totalPages" :key="page" :class="{ active: page === currentPage }">
            <a class="page-link" href="#" @click.prevent="changePage(page)">{{
              page
              }}</a>
          </li>
          <li class="page-item" :class="{ disabled: currentPage === totalPages }">
            <a class="page-link" href="#" @click.prevent="changePage(currentPage + 1)">Next</a>
          </li>
        </ul>
      </nav>
    </section>
    <Remaining />

  
    <FooterView />
  </div>
</template>

<script>
  import axios from "axios";
  import HeaderView from "@/views/Header.vue";
  import FooterView from "@/views/Footer.vue";
  import Remaining from "@/views/Remaining.vue";

  export default {
    name: "HomeView",
    components: {
      HeaderView,
      FooterView,
      Remaining
    },
    data() {
      return {
        products: [],
        currentPage: 1,
        totalPages: 1,
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
      fetchProducts(page = 1) {
        axios
          .get(
            `http://localhost/shop-nike/src/app/api/api.php/products?page=${page}&limit=4`
          )
          .then((response) => {
            this.products = response.data.products;
            this.totalPages = response.data.totalPages;
            this.currentPage = response.data.currentPage;
          })
          .catch((error) => {
            console.error("There was an error!", error);
          });
      },
      changePage(page) {
        if (page >= 1 && page <= this.totalPages) {
          this.fetchProducts(page);
        }
      },

      addToCart(product) {
      axios
        .post("http://localhost/shop-nike/src/app/api/cart", {
          user_id: this.userId,
          product_id: product.id,
          quantity: 1, 
        })
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.error("Error adding item to cart: ", error);
        });
    },
    },
    mounted() {
      this.fetchProducts();
    },
  };
</script>