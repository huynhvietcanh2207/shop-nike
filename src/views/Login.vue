<template>
  <div class="container" id="container">
    <div class="form-container sign-up" v-if="activeForm === 'signUp'">
      <form @submit.prevent="registerUser">
        <h1>Create Account</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="bi bi-google"></i></a>
          <a href="#" class="icon"><i class="bi bi-facebook"></i></a>
          <a href="#" class="icon"><i class="bi bi-github"></i></a>
          <a href="#" class="icon"><i class="bi bi-linkedin"></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" placeholder="Name" v-model="registerData.name" />
        <input type="email" placeholder="Email" v-model="registerData.email" />
        <input type="password" placeholder="Password" v-model="registerData.password" />
        <button type="submit">Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in" v-if="activeForm === 'signIn'">
      <form @submit.prevent="loginUser">
        <h1>Sign In</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="bi bi-google"></i></a>
          <a href="#" class="icon"><i class="bi bi-facebook"></i></a>
          <a href="#" class="icon"><i class="bi bi-github"></i></a>
          <a href="#" class="icon"><i class="bi bi-linkedin"></i></a>
        </div>
        <span>or use your email password</span>
        <input type="email" placeholder="Email" v-model="loginData.email" />
        <input type="password" placeholder="Password" v-model="loginData.password" />
        <a href="#">Forget Your Password?</a>
        <button type="submit">Sign In</button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Enter your personal details to use all site features</p>
          <button class="hidden" id="login" @click="toggleForm('signIn')">
            Sign In
          </button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>Register with your personal details to use all site features</p>
          <button class="hidden" id="register" @click="toggleForm('signUp')">
            Sign Up
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script scoped>
  import axios from "axios";
  import router from "@/router"; // Đảm bảo rằng đường dẫn đến router của bạn là chính xác

  export default {
    name: "Login",
    data() {
      return {
        registerData: {
          name: "",
          email: "",
          password: "",
        },
        loginData: {
          email: "",
          password: "",
        },
        activeForm: "signIn",
      };
    },
    methods: {
      async registerUser() {
        try {
          console.log("Data to be sent:", this.registerData);

          const response = await axios.post(
            "http://localhost/shop-nike/src/app/api/api.php/register",
            this.registerData
          );
          // console.log(response); máy chủ phản hồi
          // chỗ này bị lỏ nên đúng thành sai sai thành đúng 
          if (response.data && response.data.success) {
            console.log("Đăng ký thành công!");

            alert("Registration successful!");
            alert("Đăng ký không  thành công!!");

          } else {
            alert("Đăng ký thành công!!");
            router.push("/login");
          }
        } catch (error) {
          console.error("Lỗi khi đăng ký:", error);
          alert("Có lỗi xảy ra khi đăng ký.");
        }
      },
      // login nhé
      async loginUser() {
        try {
          // console.log("Data to be sent:", this.loginData);

          const response = await axios.post(
            "http://localhost/shop-nike/src/app/api/api.php/login", this.loginData
          );
          console.log(response); // In ra phản hồi từ máy chủ
          if (response.data.success) {
            // console.log("Đăng nhập thành công!");
            alert("Login successful!");
            router.push("/");
          } else {
            console.log("Đăng nhập thất bại!");
            alert("Login fails!");
          }
        } catch (error) {
          console.error("Lỗi khi gửi yêu cầu đến máy chủ:", error);
          // Thực hiện các hành động nếu có lỗi xảy ra, chẳng hạn hiển thị thông báo lỗi
        }
      },
      toggleForm(formType) {
        this.activeForm = formType;
      },
    },
    mounted() {
      const container = document.getElementById("container");
      const registerBtn = document.getElementById("register");
      const loginBtn = document.getElementById("login");
      registerBtn.addEventListener("click", () => {
        container.classList.add("active");
      });
      loginBtn.addEventListener("click", () => {
        container.classList.remove("active");
      });
    },
  };
</script>

<style scoped>
  @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
  }

  .container {
    background-color: #f0f1f3;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    margin-top: 200px;
    margin-left: 700px;
    display: flex;
    /* Thêm vào đây */
    align-items: center;
    /* Thêm vào đây */
    justify-content: center;
    /* Thêm vào đây */
    flex-direction: column;
    max-width: 100%;
    min-height: 480px;
  }

  .container p {
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.3px;
    margin: 20px 0;
  }

  .container span {
    font-size: 12px;
  }

  .container a {
    color: #3a3e45;
    font-size: 13px;
    text-decoration: none;
    margin: 15px 0 10px;
  }

  .container button {
    background-color: rgb(99, 200, 22);
    color: #f0f1f3;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
  }

  .container button.hidden {
    background-color: transparent;
    border-color: #f0f1f3;
  }

  .container form {
    background-color: #f0f1f3;
    display: flex;
    align-items: center;
    justify-content: center;

    flex-direction: column;
    padding: 0 40px;
    height: 100%;
  }

  .container input {
    background-color: #b2bed4;
    border: none;
    margin: 8px 0;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 8px;
    width: 100%;
    outline: none;
  }

  .form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
  }

  .sign-in {
    left: 0;
    width: 50%;
    z-index: 2;
  }

  .container.active .sign-in {
    transform: translateX(100%);
  }

  .sign-up {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
  }

  .container.active .sign-up {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
  }

  @keyframes move {

    0%,
    49.99% {
      opacity: 0;
      z-index: 1;
    }

    50%,
    100% {
      opacity: 1;
      z-index: 5;
    }
  }

  .social-icons {
    margin: 20px 0;
  }

  .social-icons a {
    border: 1px solid #dbc5c5;
    border-radius: 20%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    width: 40px;
    height: 40px;
  }

  .toggle-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 100px;
    z-index: 1000;
  }

  .container.active .toggle-container {
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
  }

  .toggle {
    background-color: aqua;
    height: 100%;
    background: linear-gradient(to right, #5c6bc0, #7d52e3);
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6ss ease-in-out;
  }

  .container.active .toggle {
    transform: translateX(50%);
  }

  .toggle-panel {
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
  }

  .toggle-left {
    transform: translateX(-200%);
  }

  .container.active .toggle-left {
    transform: translateX(0);
  }

  .toggle-right {
    right: 0;
    transform: translateX(0);
  }

  .container.active .toggle-right {
    transform: translateX(200%);
  }
</style>