<template>
  <div class="Pax">
    <img :src="useImg" :alt="number_sign" />
    <p>{{ firstname }}</p>
    <p>{{ lastname }}</p>
    <p>{{ average }}</p>
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
    average: String,
  },
  data() {
    return {
      useImg: require("../assets/" + this.picture),
    };
  },
};
</script>

<style scoped>
img {
  width: 50px;
  margin: 20px;
}
</style>
