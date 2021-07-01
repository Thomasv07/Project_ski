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
<<<<<<< HEAD
    <h2>M1</h2>
    <div v-for="participant in participants" :key="participant.id_category">
      <div v-if="participant.id_category == 1">
=======
    <section v-for="category in categories" :key="category.id_category" >
    <h2>{{category.type}}</h2>
    <div v-for="participant in participants" :key="participant.id_category">
      <div v-if="participant.id_category == participant.id_category <= 3">
>>>>>>> 73d55381b4caeda739c0e746664e5386f7663742
        <PaxCard
          :picture="participant.picture"
          :number_sign="participant.number_sign"
          :firstname="participant.firstname"
          :lastname="participant.lastname"
        />
      </div>
    </div>
<<<<<<< HEAD
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
=======
    </section>
>>>>>>> 73d55381b4caeda739c0e746664e5386f7663742
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
