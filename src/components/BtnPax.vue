<template>
  <div>
    <input type="button" @click="BtnPax"  id="add" value="Ajouter un participant"/>
  </div>

</template>

<script>
export default {
  name: "BtnPax",
  methods: {
    BtnPax() {
      this.$emit("BtnPax");
    },
  },
};
</script>

