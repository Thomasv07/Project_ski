<template>
  <div class="home">
    <h1>Classement:</h1>
    <PaxCard
      v-for="participant in data"
      :key="participant.id_participant"
      :picture="participant.picture"
      :number_sign="participant.number_sign"
      :firstname="participant.firstname"
      :lastname="participant.lastname"
    />
    
  </div>
</template>

<script>
// @ is an alias to /src
import PaxCard from "../components/PaxCard.vue";
import ApiService from "../services/api.services";


const apiservice = new ApiService();

export default {
  name: "Home",
    props: {
    picture: String,
    number_sign: String,
    firstname: String,
    lastname: String
  },
  components: {
    PaxCard
  },

  data() {
    return {
      data: null,
    };
  },
  mounted() {
    this.getAll();
  },
  methods: {
    async getAll() {
      const res = await apiservice.getAll();
      const data = await res.json();
      this.data = data;
     
    },
  },
};
</script>

<style scoped>
  
</style>
