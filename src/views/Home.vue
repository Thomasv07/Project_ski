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
    <section v-for="category in categories" :key="category.id_category" >
    <h2>{{category.type}}</h2>
    <div v-for="participant in participants" :key="participant.id_category">
      <div v-if="participant.id_category == participant.id_category <= 3">
        <PaxCard
          :picture="participant.picture"
          :number_sign="participant.number_sign"
          :firstname="participant.firstname"
          :lastname="participant.lastname"
        />
      </div>
    </div>
    </section>
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
    lastname: String,
  },
  components: {
    PaxCard,
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

<style scoped></style>
