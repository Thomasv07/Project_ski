<template>
  <div class="slider">
    <button @click="prev" type="button" class="btn btn-left">
      <img src="../assets/esf.jpg" class="icone" />
    </button>
    <section
      class="container-slides"
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
        <div v-for="participant in participants" :key="participant.id_category">
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
    </section>
    <button @click="next" type="button" class="btn btn-right">
      <img src="../assets/esf.jpg" class="icone" />
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
      console.log(this.index);
      if (this.index === -2000) {
        this.index = 0;
      } else {
        this.index -= 310.8;
      }
    },
    prev() {
      console.log(this.index);
      if (this.index === -2000) {
        this.index = 0;
      } else {
        this.index -= -310.8;
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
  width: 310.8px;
  height: 275px;
  margin: 100px auto 0;
  overflow: hidden;
  position: relative;
}
.container-slides {
  display: flex;
  width: 600px;
}
.cardtranslate {
  display: flex;
  border: 3px solid #42b983;
  border-radius: 5px;
  background-color: rgb(255, 255, 255);
  height: 269px;
  width: 600px;
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
  width: 15px;
}
.btn-left {
  top: 50%;
  left: 5px;
}
.btn-right {
  top: 50%;
  right: 5px;
}
.paxcardtranslate {
  display: flex;
  flex-direction: row;
}
</style>
