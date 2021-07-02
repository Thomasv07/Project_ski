<template>
  <div class="home">
    <Slider/>
    <h1>Classement:</h1>
    <div id="general">
      <h2>Classement général:</h2>
      <div class="paxgen">
        <PaxCard
          v-for="participant in participants"
          :key="participant.id_participant"
          :picture="participant.picture"
          :number_sign="participant.number_sign"
          :firstname="participant.firstname"
          :lastname="participant.lastname"
        />
      </div>
    </div>
    <section
      id="diffcat"
      v-for="category in categories"
      :key="category.id_category"
    >
      <h2>{{ category.type }}</h2>
      <div v-for="participant in participants" :key="participant.id_category">
        <PaxCard
          v-if="participant.id_category == participant.id_category"
          :id_category="participant.id_category"
          :picture="participant.picture"
          :number_sign="participant.number_sign"
          :firstname="participant.firstname"
          :lastname="participant.lastname"
        />
      </div>
    </section>
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
progress {
  top: 150px;
  transform: rotate(90deg);
  right: 0;
}

h2 {
  display: flex;
  align-items: center;
  font-size: 30px;
  flex-direction: column;
}
h2::after {
  content: " ";
  width: 35%;
  height: 2px;
  background: rgb(0, 0, 0);
}
#general {
  border: 2px solid #42b983;
  border-radius: 5px;
  background-color: rgb(255, 255, 255);
  width: 40%;
  margin-left: 50px;
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
