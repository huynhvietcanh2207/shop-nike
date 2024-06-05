<template>
  <div class="CategoryProduct">
    <HeaderView />
    <!-- buton 3d -->
    <div class="btn-3d">
      <a href="#">
        <span style="font-size: 0.8em; font-weight: bold" class="front">SHOP NOW</span>
        <span style="font-size: 0.8em; font-weight: bold" class="top">SHOP NOW</span>
      </a>
    </div>
    <!-- product -->
    <div class="shoes">
      <section class="section-nike">
        <div class="section-font">
          <h1>Tame the Terrain<span></span></h1>
          <h1>NICE<span>ZEGAMA 2</span></h1>
        </div>

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
                      <div class="image">
                        <a href="">
                          <img :src="'/image/' + product.image" class="img img-fluid" :alt="product.name" />
                        </a>
                      </div>
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
      </section>
    </div>
    <!-- Pagination
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
    </nav> --> 
    <FooterView />
  </div>
</template>

<script>
  import axios from "axios";
  import HeaderView from "@/views/Header.vue";
  import FooterView from "@/views/Footer.vue";

  export default {
    name: "CategoryProduct",
    components: {
      HeaderView,
      FooterView,
    },
    data() {
      return {
        products: [],
      };
    },
    methods: {
      loadProductsByCategory(categoryId) {
        axios
          .get(
            `http://localhost/shop-nike/src/app/api/api.php/productsByCategory?categories_id=${categoryId}`
          )
          .then((response) => {
            this.products = response.data;
          })
          .catch((error) => {
            console.error("Error fetching products by category:", error);
          });
      },
      runAnimations() {
        const button = document.querySelector(".btn-3d");
        const shoes = document.querySelector(".shoes");
        const servicesFont = document.querySelector(".section-font");
        const navigation = document.querySelector(".pagination");

        function isIntoView(el) {
          if (el) {
            const rect = el.getBoundingClientRect();
            return rect.bottom <= window.innerHeight;
          }
        }

        isIntoView(button);
        isIntoView(shoes);
        isIntoView(servicesFont);
        isIntoView(navigation);
        window.addEventListener("scroll", () => {
          if (isIntoView(button)) {
            button.classList.add("active");
            // console.log('Class active đã được thêm vào');
          }

          if (isIntoView(shoes)) {
            shoes.classList.add("active");
            // console.log('Class active đã được thêm a vào');
          }

          if (isIntoView(servicesFont)) {
            servicesFont.classList.add("active");
            // console.log('Class active đã được thêm a vào');
          }
          if (isIntoView(navigation)) {
            navigation.classList.add("active");
            // console.log('Class active đã được thêm a vào');
          }
        });
      },
    },
    mounted() {
      const categoryId = this.$route.params.categoryId;
      if (categoryId) {
        this.loadProductsByCategory(categoryId);
      } else {
        alert("Category ID is missing from route params");
        console.log("Category ID is missing from route params");
      }
      this.runAnimations();
    },
  };
</script>



<style scoped>
  /* CSS cho trang CategoryProduct */
</style>