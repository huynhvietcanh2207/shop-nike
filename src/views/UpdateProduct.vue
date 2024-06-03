<template>
    <!-- <h4 class="text-center" style="font-size: 1.5em; font-weight: bold;">Quản lý sản phẩm</h4> -->
    <div class="container">
    <div class="form_area">
        <p class="title">Update Product</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form_group">
                <label class="sub_title" for="name">Id:</label>
                <input placeholder="Enter your id" class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Name:</label>
                <input placeholder="Enter your name"  name="name"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Price:</label>
                <input placeholder="Enter your price"  name="price"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Image:</label>
                <input placeholder="Enter your image"  name="image"  class="form_style" type="file">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Description:</label>
                <input placeholder="Enter your description"  name="description"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Size:</label>
                <input placeholder="Enter your size"  name="size"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Views:</label>
                <input placeholder="Enter your views"  name="views"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Likes:</label>
                <input placeholder="Enter your likes"  name="likes"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Categories_Id:</label>
                <input placeholder="Enter your categories_id"  name="categories_id"  class="form_style" type="text">
            </div>
          
            <div>
                <input type="submit" class="btn" name="update" value="Update">
                <!-- <button class="btn">SIGN UP</button> -->
                <a class="link" href="">
            </a></div><a class="link" href="">
        
    </a></form></div><a class="link" href="">
</a></div>
  </template>
  
  <script>
  
 
  </script>
  
  <style scoped>
  /* CSS cho App.vue */
  @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");

  .container {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  text-align: center;
}

.form_area {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background-color: white;
  height: auto;
  width:auto;
  /* auto là tự canh */
  border: 2px solid #264143;
  border-radius: 20px;
  box-shadow: 3px 4px 0px 1px #E99F4C;
}

.title {
  color: #264143;
  font-weight: 900;
  font-size: 1.5em;
  margin-top: 20px;
}

.sub_title {
  font-weight: 600;
  margin: 5px 0;
}

.form_group {
  display: flex;
  flex-direction: column;
  align-items: baseline;
  margin: 10px;
}

.form_style {
  outline: none;
  border: 2px solid #264143;
  box-shadow: 3px 4px 0px 1px #E99F4C;
  width: 290px;
  padding: 12px 10px;
  border-radius: 4px;
  font-size: 15px;
}

.form_style:focus, .btn:focus {
  transform: translateY(4px);
  box-shadow: 1px 2px 0px 0px #E99F4C;
}

.btn {
  padding: 15px;
  margin: 25px 0px;
  width: 290px;
  font-size: 15px;
  background: rgb(188, 234, 188);
  border-radius: 10px;
  font-weight: 800;
  box-shadow: 3px 3px 0px 0px #E99F4C;
}

.btn:hover {
  opacity: .9;
}

.link {
  font-weight: 800;
  color: #264143;
  padding: 5px;
}
  </style>
  