<template>
  <div class="slider">
    <button @click="prev" type="button" class="btn btn-left">
      <img src="../assets/gauche.png" class="icone" />
    </button>
    <section class="container-slides">
      <div
        class="listCard"
        :style="{
          transform: `translateX(${index}px)`,
          transition: `${transition}`,
        }"
      >
        <div
          class="cardtranslate"
          v-for="category in categories"
          :key="category.id_category"
        >
          <h2>{{ category.type }}</h2>
          <div
            v-for="participant in participants"
            :key="participant.id_category"
          >
            <div class="paxcardtranslate">
              <PaxCard
                v-if="category.id_category == participant.id_category"
                :id_category="participant.id_category"
                :picture="participant.picture"
                :number_sign="participant.number_sign"
                :firstname="participant.firstname"
                :lastname="participant.lastname"
                :average="participant.average"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <button @click="next" type="button" class="btn btn-right">
      <img src="../assets/droite.png" class="icone" />
    </button>
  </div>
</template>

<script>
import PaxCard from "../components/PaxCard.vue";
import ApiService from "../services/api.services";

const apiservice = new ApiService();

export default {
  name: "Slider",
  data: function () {
    return {
      index: 0,
      transition: "transform 0.2s ease",
      participants: null,
      categories: null,
    };
  },
  components: {
    PaxCard,
  },
  mounted() {
    this.getAll();
    this.getSelect();
  },
  methods: {
    next() {
      const section = document.querySelector(".listCard");
      const containerSlides = document.querySelector(".container-slides");
      const step = containerSlides.offsetWidth;
      const maxSlide = section.offsetWidth - step;

      if (this.index == -maxSlide) {
        this.index = -maxSlide;
      } else {
        this.index -= step;
      }
    },
    prev() {
      const containerSlides = document.querySelector(".container-slides");
      const step = containerSlides.offsetWidth;

      if (this.index == 0) {
        this.index = 0;
      } else {
        this.index += step;
      }
    },
    async getAll() {
      const res = await apiservice.getAll();
      const data = await res.json();
      this.participants = data;
    },
    async getSelect() {
      const res = await apiservice.getSelect();
      const data = await res.json();
      this.categories = data;
    },
  },
};
</script>

<style scoped>
.slider {
  width: 500px;
  height: 256px;
  margin: 100px auto 0;
  overflow: hidden;
  position: relative;
}
.listCard {
  display: flex;
  position: absolute;
  left: 0;
  top: 0;
}
.cardtranslate {
  display: flex;
  border: 3px solid #c7260c;
  border-radius: 5px;
  background-color: rgb(255, 255, 255);
  width: 494px;
  height: 250px;
}

.btn {
  outline: none;
  border: none;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: block;
  position: absolute;
  z-index: 1000;
  cursor: pointer;
  font-size: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.icone {
  width: 30px;
}
.btn-left {
  top: 45%;
  left: 5px;
}
.btn-right {
  top: 45%;
  right: 5px;
}
.btn-left:hover,
.btn-right:hover {
  background-color: rgba(0, 0, 0, 0.295);
}
</style>
