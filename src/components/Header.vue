<template>
  <div>
    <div class="title">
      <div>
        <img class="montagne" :src="require('../assets/logoski.png')" />
      </div>
      <nav class="nav2">
        <router-link class="router" to="/">Résultat</router-link>
        <router-link class="router" to="/import">Importer</router-link>
      </nav>
      <nav class="nav1">
        <img class="logo" :src="require('../assets/ffs.png')" />
        <router-link class="router" to="/export"
          >Création d'événements</router-link
        >
      </nav>
    </div>
    <div class="trait"></div>
    <img
      class="snow"
      v-if="checkIfExport"
      :src="require('../assets/casque.png')"
    />
    <img
      class="snow"
      v-else-if="checkIfImport"
      :src="require('../assets/skieuse.png')"
    />
    <img
      class="snow"
      v-else-if="checkIfHome"
      :src="require('../assets/couv1.png')"
    />
  </div>
</template>

<script>
export default {
  name: "Header",

  computed: {
    checkIfExport() {
      return this.$route.path === "/export" ? true : false;
    },
    checkIfImport() {
      return this.$route.path === "/import" ? true : false;
    },
    checkIfHome() {
      return this.$route.path === "/" ? true : false;
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
* {
  margin: 0;
  padding: 0;
}
@media screen and (max-width: 1305px) {
  img.logo {
    width: 125px;
    left: -155px;
  }
  a.router {
    font-size: 25px;
  }
}
@media screen and (max-width: 800px) {
  img.logo {
    width: 75px;
    left: -130px;
  }
  a.router {
    font-size: 18px;
  }
}
@media screen and (max-width: 600px) {
  img.logo {
    width: 50px;
    left: -120px;
  }
  a.router {
    font-size: 14px;
  }
}
@media screen and (max-width: 530px) {
  img.logo {
    width: 40px;
    left: -100px;
  }
  a.router {
    font-size: 10px;
    margin: 0 10px;
  }
  img.montagne {
    width: 50px;
  }
}
@media screen and (max-width: 470px) {
  img.logo {
    width: 40px;
    left: -100px;
  }
  a.router {
    font-size: 10px;
    margin: 0 10px;
  }
  img.montagne {
    width: 50px;
  }
  nav.nav2 {
    margin-top: 15px;
    flex-direction: column;
    padding-right: 70px;
  }
  nav.nav1 {
    
    flex-direction: column;
    position: absolute;
  }
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
.router {
  font-size: 35px;
  color: red;
  text-decoration: none;
}
.logo {
  display: flex;
  left: -175px;
  z-index: 9999;
  position: absolute;
  top: 20px;
  width: 150px;
}
.snow {
  background-size: cover;
  background-repeat: no-repeat;
  width: 100%;
  z-index: -20;
}
.montagne {
  width: 90px;
  margin: 5px;
}
h3 {
  margin: 0;
}
.trait {
  width: 100%;
  height: 8px;
  background: red;
}
</style>
