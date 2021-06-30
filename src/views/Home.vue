<template>
  <div class="home">
    <h1>Classement:</h1>
    <div id="general">
      <h2>Classement général:</h2>
    <PaxCard
      v-for="participant in participants"
      :key="participant.id_participant"
      :picture="participant.picture"
      :number_sign="participant.number_sign"
      :firstname="participant.firstname"
      :lastname="participant.lastname"
    />
    </div>
      <h2>M1</h2>
      <div v-for="participant in participants" :key="participant.id_category">
        <div v-if="participant.id_category == 1" ><PaxCard :picture="participant.picture"
      :number_sign="participant.number_sign"
      :firstname="participant.firstname"
      :lastname="participant.lastname"/></div>
      </div>
<h2>M2</h2>

    <!-- <div>
          <PaxCard
      v-for="participant in categories"
      :key="participant.id_category"
      :picture="participant.picture"
      :number_sign="participant.number_sign"
      :firstname="participant.firstname"
      :lastname="participant.lastname"
      :category="participant.id_category"
    />
    </div> -->
  </div>
</template>

<script>
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
      participants: null,
      categories : null
    };
  },
  mounted() {
    this.getAll();
    this.getCategory();
  },
  methods: {
    async getAll() {
      const res = await apiservice.getAll();
      const data = await res.json();
      this.participants = data;
     
    },
    async getCategory(){
      const res = await apiservice.getCategory();
      const data = await res.json();
      this.categories = data;
    
    }
  },
};
</script>

<style scoped>
  
</style>
