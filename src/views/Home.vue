<template>
  <div class="home">
    <div class="banniere"></div>
    <img class="skidefond" :src="require('../assets/skidefond.png')" />
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
      <span class="grad_line3"></span>
    </div>
    <Slider />
    <img class="skidefond1" :src="require('../assets/skidefond1.png')" />
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
@media screen and (max-width: 1150px) {
  div.home {
    display: flex;
    flex-direction: column;
  }
  div#general{
    width: 406px;
  }
  img.skidefond{
    display: none;
  }
  img.skidefond1{
    display: none;
  }
}
.home {
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.homepage {
  display: flex;
  align-items: center;
  font-size: 30px;
  flex-direction: column;
}
#general {
  border: 2px solid #c7260c;
  border-radius: 5px;
  background-color: rgb(255, 255, 255);
  width: 30%;
  margin: 50px;
  height: 500px;
  overflow: auto;
}
.Pax {
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}
::-webkit-scrollbar {
  width: 20px;
}
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 5px;
}
::-webkit-scrollbar-thumb {
  background: #c7260c;
  border-radius: 10px;
}
.skidefond {
  border: 2px solid #c7260c;
  border-radius: 5px;
  margin: 15px;
  width: 13%;
}
.skidefond1 {
  border: 2px solid #c7260c;
  border-radius: 5px;
  margin: 15px;
  width: 13%;
}
</style>
