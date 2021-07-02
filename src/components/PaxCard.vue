<template>
  <div class="Pax">
    <img v-bind:src="'@/assets/'+ picture" :alt="number_sign"/>
    <h2>{{id_category}}</h2>
    <p>{{ firstname }}</p>
    <p>{{ lastname }}</p>
  </div>
</template>

<script>
export default {
  name: "PaxCard",
  props: {
    picture: String,
    id_category: Number,
    number_sign: String,
    firstname: String,
    lastname: String,
  },
};
</script>

<style scoped>
img {
  width: 50px;
  margin: 20px;
}
</style>
