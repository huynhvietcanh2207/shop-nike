<template>
  <div class="container">
    <h1 class="mt-5 mb-4">Trang Hỗ Trợ</h1>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liên Hệ Chúng Tôi</h5>
        <p class="card-text">Nếu bạn cần hỗ trợ hoặc có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi.</p>
        <form @submit.prevent="submitForm">
          <div class="form-group">
            <label for="name">Tên của bạn:</label>
            <input type="text" class="form-control" id="name" v-model="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email của bạn:</label>
            <input type="email" class="form-control" id="email" v-model="email" required>
          </div>
          <div class="form-group">
            <label for="message">Nội dung tin nhắn:</label>
            <textarea class="form-control" id="message" rows="5" v-model="message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Gửi Tin Nhắn</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import router from "@/router"; 

export default {
  data() {
    return {
      name: '',
      email: '',
      message: ''
    };
  },
  methods: {
    submitForm() {
      console.log('Tin nhắn đã được gửi:');
      console.log('Tên:', this.name);
      console.log('Email:', this.email);
      console.log('Nội dung:', this.message);
      this.name = '';
      this.email = '';
      this.message = '';
      // Hiển thị thông báo cho người dùng
      alert('Tin nhắn của bạn đã được gửi! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
      router.push("/");
          setTimeout(() => {
            window.location.reload();
          }, 100); 
    }
  }
};
</script>

<style scoped>
/* Thêm CSS tùy chỉnh nếu cần */
</style>
