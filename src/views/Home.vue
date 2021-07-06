<template>
  <div class="home">
    <div class="banniere">
        <img :src="require('../assets/skidefond1.png')" />
        <img :src="require('../assets/skidefond.png')" />
      </div>
    <div id="general">
      
      <h2 class="homepage">Classement général:</h2>
      <div class="paxgen">
        <PaxCard
          v-for="participant in participants"
          :key="participant.id_participant"
          :picture="participant.picture"
          :number_sign="participant.number_sign"
          :firstname="participant.firstname"
          :lastname="participant.lastname"
          :average="participant.average"
        />
      </div>
    </div>
    <Slider />
  </div>
</template>

<script>
// @ is an alias to /src
import PaxCard from "../components/PaxCard.vue";
import ApiService from "../services/api.services";
import Slider from "../components/Slider.vue";

const apiservice = new ApiService();

export default {
  name: "Home",
  props: {
    picture: String,
    number_sign: String,
    firstname: String,
    lastname: String,
    average: String
  },
  components: {
    PaxCard,
    Slider,
  },

  data() {
    return {
      participants: null,
      categories: null,
    };
  },
  mounted() {
    this.getAll();
    this.getSelect();
  },
  methods: {
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
.banniere {
  display: flex;
  justify-content: space-between;
  width: 100%;
  position: absolute;
}
.home {
  display: flex;
  justify-content: space-around;
  align-items: center;
  margin: 0 200px;
}
progress {
  top: 150px;
  transform: rotate(90deg);
  right: 0;
}
.slider {
  margin: 50px;
}
.homepage {
  display: flex;
  align-items: center;
  font-size: 30px;
  flex-direction: column;
}
.homepage::after {
  content: " ";
  width: 35%;
  height: 2px;
}
#general {
  border: 2px solid #42b983;
  border-radius: 5px;
  background-color: rgb(255, 255, 255);
  width: 40%;
  margin: 50px;
  height: 500px;
  overflow: auto;
}
.Pax {
  display: flex;
  justify-content: space-around;
  margin: 10px;
}

::-webkit-scrollbar {
  width: 20px;
}
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 5px;
}
::-webkit-scrollbar-thumb {
  background: red;
  border-radius: 10px;
}
#diffcat {
  border: 2px solid #42b983;
  border-radius: 5px;
  background-color: rgb(255, 255, 255);
}
</style>
