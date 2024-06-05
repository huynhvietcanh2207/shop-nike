<template>
  <div class="Remaining">
    <!-- about -->
    <div class="about" id="About">
      <div class="about_font">
        <h1>Web<span>About</span></h1>
      </div>

      <div class="about_main">
        <div class="about_image">
          <div class="about_small_image">
            <img src="image/den1.png" class="thumbnail" @click="functio" />
            <img src="image/den2.png" class="thumbnail" @click="functio" />
            <img src="image/den3.png" class="thumbnail" @click="functio" />
            <img src="image/den4.png" class="thumbnail" @click="functio" />
          </div>

          <div class="image_contaner">
            <img src="image/den4.png" id="imagebox" class="big-photo" />
          </div>
        </div>

        <div class="about_text">
          <div class="snow-canvas"></div>
          <p>
            Contrary to popular belief, Lorem Ipsum is not simply random text.
            It has roots in a piece of classical Latin literature from 45 BC,
            making it over 2000 years old. Richard McClintock, a Latin professor
            at Hampden-Sydney College in Virginia, looked up one of the more
            obscure Latin words, consectetur, from a Lorem Ipsum passage, and
            going through the cites of the word in classical literature,
            discovered the undoubtable source. Lorem Ipsum comes from sections
            1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
            of Good and Evil) by Cicero, written in 45 BC. This book is a
            treatise on the theory of ethics, very popular during the
            Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit
            amet..", comes from a line in section 1.10.32. The standard chunk of
            Lorem Ipsum used since the 1500s is reproduced below for those
            interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et
            Malorum" by Cicero are also reproduced in their exact original form,
            accompanied by English versions from the 1914 translation by H.
            Rackham.
          </p>
        </div>
      </div>
      <div class="btn-4d">
        <a href="#">
          <span style="font-size: 0.8em; font-weight: bold" class="front"
            >SHOP NOW</span
          >
          <span style="font-size: 0.8em; font-weight: bold" class="top"
            >SHOP NOW</span
          >
        </a>
      </div>
    </div>

    <!--Review-->
    <div class="review" id="Review">
      <div class="review_font">
        <h1>Customer's<span>review</span></h1>
      </div>
      <div class="review_box box1">
        <div class="review_card">
          <div class="card_top">
            <div class="profile">
              <div class="profile_image">
                <img src="image/man_dp3.jpg" />
              </div>

              <div class="name">
                <strong>Ranidi Lochana</strong>
              </div>
            </div>
          </div>
          <div class="comment">
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis,
              amet nesciunt voluptatem cum architecto ipsum vero nulla
              voluptatibus dolorum modi assumenda eum? Aliquid inventore velit
              ipsa repellat numquam atque dolores!
            </p>
          </div>
        </div>

        <div class="review_card">
          <div class="card_top">
            <div class="profile">
              <div class="profile_image">
                <img src="image/man_dp3.jpg" />
              </div>

              <div class="name">
                <strong>Sayuru Tharanga</strong>
              </div>
            </div>
          </div>
          <div class="comment">
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis,
              amet nesciunt voluptatem cum architecto ipsum vero nulla
              voluptatibus dolorum modi assumenda eum? Aliquid inventore velit
              ipsa repellat numquam atque dolores!
            </p>
          </div>
        </div>

        <div class="review_card">
          <div class="card_top">
            <div class="profile">
              <div class="profile_image">
                <img src="image/man_dp3.jpg" />
              </div>

              <div class="name">
                <strong>Senuda Dilwan</strong>
              </div>
            </div>
          </div>
          <div class="comment">
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis,
              amet nesciunt voluptatem cum architecto ipsum vero nulla
              voluptatibus dolorum modi assumenda eum? Aliquid inventore velit
              ipsa repellat numquam atque dolores!
            </p>
          </div>
        </div>
      </div>
      <div class="review_box box2">
        <div class="review_card">
          <div class="card_top">
            <div class="profile">
              <div class="profile_image">
                <img src="image/man_dp3.jpg" />
              </div>

              <div class="name">
                <strong>Ranidi Lochana</strong>
              </div>
            </div>
          </div>
          <div class="comment">
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis,
              amet nesciunt voluptatem cum architecto ipsum vero nulla
              voluptatibus dolorum modi assumenda eum? Aliquid inventore velit
              ipsa repellat numquam atque dolores!
            </p>
          </div>
        </div>

        <div class="review_card">
          <div class="card_top">
            <div class="profile">
              <div class="profile_image">
                <img src="image/man_dp3.jpg" />
              </div>

              <div class="name">
                <strong>Sayuru Tharanga</strong>
              </div>
            </div>
          </div>
          <div class="comment">
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis,
              amet nesciunt voluptatem cum architecto ipsum vero nulla
              voluptatibus dolorum modi assumenda eum? Aliquid inventore velit
              ipsa repellat numquam atque dolores!
            </p>
          </div>
        </div>

        <div class="review_card">
          <div class="card_top">
            <div class="profile">
              <div class="profile_image">
                <img src="image/man_dp3.jpg" />
              </div>

              <div class="name">
                <strong>Senuda Dilwan</strong>
              </div>
            </div>
          </div>
          <div class="comment">
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis,
              amet nesciunt voluptatem cum architecto ipsum vero nulla
              voluptatibus dolorum modi assumenda eum? Aliquid inventore velit
              ipsa repellat numquam atque dolores!
            </p>
          </div>
        </div>
      </div>
    </div>

    <!--Services-->
    <div class="services mt-5" id="Servises">
      <div class="services_font margin-top:100px">
        <h1>our<span>services</span></h1>
      </div>

      <div class="container services_cards my-5">
        <div class="row services1 servicess">
          <div class="col-4">
            <div
              class="vienkimcuong"
              style="
                text-align: center;
                font-size: 50px;
                font-weight: bold;
                margin-bottom: 20px;
              "
            >
              <i class="bi bi-truck"></i>
            </div>
            <h4 style="text-align: center">Fast Delivery</h4>
            <p style="text-align: center; color: white">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p>
          </div>
          <div class="col-4">
            <div
              class="gift"
              style="
                text-align: center;
                font-size: 50px;
                font-weight: bold;
                margin-bottom: 20px;
              "
            >
              <i class="bi bi-arrow-counterclockwise"></i>
            </div>
            <h4 style="text-align: center">10 Days Replacement</h4>
            <p style="text-align: center; color: white">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p>
          </div>
          <div class="col-4">
            <div
              class="cup"
              style="
                text-align: center;
                font-size: 50px;
                font-weight: bold;
                margin-bottom: 20px;
              "
            >
              <i class="bi bi-headset"></i>
            </div>
            <h4 style="text-align: center">24 x 7 Support</h4>
            <p style="text-align: center; color: white">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            </p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row services2 servicess">
          <div class="col-4">
            <div
              class="vienkimcuong"
              style="text-align: center; font-size: 50px; margin-bottom: 20px"
            >
              <i class="bi bi-currency-exchange"></i>
            </div>
            <h4 style="text-align: center">Free 1st Exchange</h4>
            <p style="text-align: center; color: white">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab sequi
              dignissimos ullam fuga placeat qui tempore exercitationem dolor
              voluptatum facilis ratione, recusandae voluptas maxime dolore
              optio in. Ipsum, omnis architecto!
            </p>
          </div>
          <div class="col-4">
            <div
              class="gift"
              style="text-align: center; font-size: 50px; margin-bottom: 20px"
            >
              <i class="bi bi-tag-fill"></i>
            </div>
            <h4 style="text-align: center">Everyday Item Discount</h4>
            <p style="text-align: center; color: white">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab sequi
              dignissimos ullam fuga placeat qui tempore exercitationem dolor
              voluptatum facilis ratione, recusandae voluptas maxime dolore
              optio in. Ipsum, omnis architecto!
            </p>
          </div>
          <div class="col-4">
            <div
              class="cup"
              style="text-align: center; font-size: 50px; margin-bottom: 20px"
            >
              <i class="bi bi-percent"></i>
            </div>
            <h4 style="text-align: center">Member discount</h4>
            <p style="text-align: center; color: white">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab sequi
              dignissimos ullam fuga placeat qui tempore exercitationem dolor
              voluptatum facilis ratione, recusandae voluptas maxime dolore
              optio in. Ipsum, omnis architecto!
            </p>
          </div>
        </div>
      </div>

      <div class="Claritas">
        <div class="container textClaritas">
          <div class="text-claritas">
            <i style="color: rgb(243, 245, 249); text-align: center">
              Claritas est etiam processus dynamicus, qui sequitur mutationem
              consuetudium lectorum. Mirum est notare quam littera gothica, quam
              nunc putamus parum claram, anteposuerit litterarum formas
            </i>
          </div>
          <h5 class="pt-3 pb-5" style="text-align: center">
            KEVIN LEE AT WALL STREET - NEW YORK
          </h5>
        </div>
        <form action="" class="Claritas1" method="get">
          <input
            type="text"
            name=""
            placeholder="Your email address"
            class="form-control"
            id=""
          />
        </form>
        <a href="#" class="btn-animation mt-3 Claritas2">
          <div class="text">Subcribe</div>
        </a>
      </div>
    </div>
  </div>
</template>
<script>
// import axios from "axios";
// import HeaderView from "@/views/Header.vue";
// import FooterView from "@/views/Footer.vue";
// import { mapState } from "vuex";

export default {
  name: "Remaining",
  components: {

    
  },
};
</script>