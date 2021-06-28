<template>
  <div class="home">
    <Header />
    <p>Home</p>
  </div>
</template>

<script>
// @ is an alias to /src
import Header from "@/components/Header.vue";
import ApiService from "../services/api.services";

const apiservice = new ApiService();

export default {
  name: "Home",
  components: {
    Header
  },
  data() {
    return {
      data: null,
    };
  },
  methods: {
    async getAll(pax) {
      const res = await apiservice.getAll(pax);
      const data = await res.json();
      this.data = data.results;
    },
  },
};
</script>
