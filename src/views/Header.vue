<template>
  <div class="header">
    <!-- Nav -->
    <div id="navmenu">
      <div id="toggle">
        <i class="bi bi-list"></i>
      </div>
      <nav class="navbar navbar-expand-sm fixed-top custom-navbar">
        <div class="container-fluid w-100">
          <a class="navbar-brand" href="">
            <div class="nike"></div>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mynavbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-center"
            id="mynavbar"
          >
            <ul class="navbar-nav text-uppercase">
              <div class="category">
                <!-- category dùng ở đây nhá -->
                <li
                  v-for="category in categories"
                  :key="category.id"
                  class="nav-item"
                >
                  <a class="nav-link" :href="`#${category.name}`">{{ category.name }}</a>
                </li>
              </div>
              <li class="nav-item">
                <a class="nav-link" href="">Favorites</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#About">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Review">Review</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Servises">Servises</a>
              </li>
            </ul>
          </div>
          <!-- search -->
          <div class="input-group">
            <input
              type="search"
              class="form-control rounded"
              placeholder="Search"
            />
            <button type="button" class="btn" data-mdb-ripple-init>
              <i class="bi bi-search"></i>
            </button>
          </div>
          <!-- icon -->
          <div class="icons">
            <i class="bi bi-heart-fill"></i>
            <i class="bi bi-cart"></i>
            <div class="dropdown">
              <router-link to="/login" class="profile-link">
                <i class="bi bi-person-circle"></i>
              </router-link>
              <div class="dropdown-content">
                <router-link to="/login">Login</router-link>
                <router-link to="/logout">Logout</router-link>
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
      <li><a href="">Guide Online</a></li>
      <li><a href="">Edit</a></li>
      <li><a href="">Support</a></li>
    </ul>
  </nav>
</template>
<script>
import axios from "axios";

export default {
  name: "HeaderView",
  data() {
    return {
      categories: [],
    };
  },
  mounted() {
    // Call the API to get categories
    axios
      .get("http://localhost/shop-nike/src/app/api/api.php/categories")
      .then((response) => {
        // Store categories in data
        this.categories = response.data;
      })
      .catch((error) => {
        console.error("Error fetching categories:", error);
      });
  },
};
</script>
<style >
/* CSS cho dropdown menu */
</style>