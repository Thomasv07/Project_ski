<template>
  <div class="Pax">
    <img v-bind:src="'../medias/' + picture" :alt="number_sign" />
    <h2>{{ firstname }}</h2>
    <h2>{{ lastname }}</h2>
  </div>
</template>

<script>
export default {
  name: "PaxCard",
  props: {
    picture: String,
    number_sign: String,
    firstname: String,
    lastname: String,
  },
};
</script>

<style scoped>
img {
  width: 250px;
  margin: 20px;
}
</style>
