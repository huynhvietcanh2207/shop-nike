<template>
  <div class="header">
    <!-- Nav -->
    <div id="navmenu">
      <div id="toggle">
        <i class="bi bi-list"></i>
      </div>
      <nav class="navbar navbar-expand-sm fixed-top custom-navbar">
        <div class="container-fluid w-100">
          <a class="navbar-brand" href="#">
            <div class="nike"></div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="mynavbar">
            <ul class="navbar-nav text-uppercase">
              <div class="category">
                <ul>
                  <li v-for="category in categories" :key="category.id" class="nav-item">
                    <router-link :to="{ name: 'categoryproduct', params: { categoryId: category.id }}"
                      class="nav-link">{{ category.name }}</router-link>
                  </li>
                </ul>
              </div>

              <li class="nav-item">
                <a class="nav-link" href="#">Favorites</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#About">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Review">Review</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Servises">Services</a>
              </li>
            </ul>
          </div>
          <div class="input-group">
            <input ref="searchInput" type="search" class="form-control rounded" placeholder="Search"
              @input="productSearch">
            <ul v-if="searchResults.length > 0" class="list-group position-absolute product-list"
              style="inset: 0; top: 100%; z-index: 2;">
              <li v-for="product in searchResults" :key="product.id" class="list-group-item"
                @click="getProductById(product.id)">
                {{ product.name }}
              </li>
            </ul>
          </div>
          <!-- icon -->
          <div class="icons">
            <i class="bi bi-heart-fill"></i>
            <router-link to="/cart"> <i class="bi bi-cart"></i></router-link>

            <div class="dropdown">
              <router-link to="/login" class="profile-link">
                <i class="bi bi-person-circle"></i>
              </router-link>
              <div class="dropdown-content">
                <div v-if="isLoggedIn"> <router-link to="/logout" class="profile-link">Logout</router-link> </div>
                <div v-else> <router-link to="/login" class="profile-link">Login</router-link> </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- side nav -->
  <nav class="side-nav">
    <ul>
      <li><a href="#">Guide Online</a></li>
      <li><a href="#">Edit</a></li>
      <li> <router-link to="/support">Support</router-link></li>
    </ul>
  </nav>
</template>

<script>
  import axios from "axios";

  export default {
    data() {
      return {
        searchResults: [],
        categories: [] 
      };
    },
    methods: {
      async productSearch() {
        console.log('Searching for products...');

        // Kiểm tra xem this.$refs.searchInput có tồn tại không
        if (this.$refs.searchInput) {
          const searchKeyword = this.$refs.searchInput.value;
          console.log(this.$refs.searchInput);

          if (searchKeyword.trim() !== '') {
            try {
              const response = await axios.get(`http://localhost/shop-nike/src/app/api/api.php/search?q=${searchKeyword}`);
              this.searchResults = response.data;
              console.log(this.searchResults);

            } catch (error) {
              console.error('Error fetching search results:', error);
              this.searchResults = [];
            }
          } else {
            this.searchResults = [];
          }
        } else {
          console.warn('Search input element is not available.');
        }
      },

      fetchCategories() {
        axios
          .get('http://localhost/shop-nike/src/app/api/api.php/categories')
          .then((response) => {
            this.categories = response.data;
          })
          .catch((error) => {
            console.error('Error fetching categories:', error);
          });
      },
    },
    mounted() {
      this.fetchCategories();
    },
  };
</script>

<style>
  /* CSS cho dropdown menu */
</style>