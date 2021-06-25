<template>
  <div>
    <div class="title">
      <div>
        <h3>Snow<br />generation</h3>
        <img class="montagne" :src="require('../assets/mountain.png')" />
      </div>
      <nav class="nav2">
        <router-link to="/">Résultat</router-link>
        <router-link to="/import">Importer</router-link>
      </nav>
      <nav class="nav1">
        <img class="logo" :src="require('../assets/logoesf.png')" />
        <router-link to="/export">Création d'événements</router-link>
      </nav>
    </div>
    <div class="trait"></div>
    <img class="snow" :src="require('../assets/couv.png')" />
  </div>
</template>

<script>
export default {
  name: "Header",
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
*{
margin: 0;
padding: 0;
}
.title {
display: flex;
}
.nav1 {
display: flex;
justify-content: space-evenly;
width: 100vw;
align-items: center;
position: relative;

}
.nav2 {
display: flex;
justify-content: space-around;
width: 100vw;
align-items: center;
padding-right: 150px;
box-sizing: border-box;

}
a {
font-size: 35px;
color: red;
text-decoration: none;
}
.logo {
display: flex;
left: -209px;
z-index: 9999;
position: absolute;
top: 20px;
}
.snow {
background-size: cover;
background-repeat: no-repeat;
width: 100%;
z-index: -20;
}
.montagne {
width: 90px;
}
h3 {
margin: 0;
}
.trait {
width : 100%;
height : 8px;
background : red;
}
</style>
