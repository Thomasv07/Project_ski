<template>
  <div class="foot">
    <div class="container">
      <div class="evenement">
        <p class="gras">Evénements</p>
        <ul>
          <li>Résultats</li>
          <li>Compétitions nationale</li>
          <li>Course en live</li>
          <li>Calendrier</li>
        </ul>
      </div>
      <div class="discipline">
        <p class="gras">Discipline</p>
        <ul>
          <li>Ski alpin</li>
          <li>Snowboard</li>
          <li>Freestyle</li>
          <li>Hors-piste</li>
        </ul>
      </div>
      <p>
        Snow Generations, l’histoire faite dengagement, de partage et
        d'innovation. 17000 moniteurs Snow Generation autour de la France, réunis
        autour des mêmes valeurs. Rendant la montagne accessible à tous, Snow
        Generation accueille tous le monde dans des compétions pour tous.
      </p>
    </div>
    <div class="trait"></div>
    <div class="er">
      <div>
        <h3>Snow<br />generation</h3>
        <img class="montagne" :src="require('../assets/mountain.png')" />
      </div>
      <p class="droit">
        © Tout droits réservés I Mentions légales I Réalisation Caroline Bony,
        Thomas Vagner I Paremètres des cookies
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
}
.foot {
  background-color: #4a4a4a;
}
.gras {
  font-weight: bold;
  font-size: 20px;
  text-decoration: underline;
}
.container {
    
  display: flex;
  justify-content: space-around;
}
.evenement {
    
  width: 200px;
  color: white;
}
ul {
  list-style: none;
  margin-left: 40px;
}
li {
  margin-top: 5px;
}
li::before {
  content: "•";
  color: red;
  display: inline-block;
  width: 1em;
  margin-left: -1em;
}
.discipline {

  width: 200px;
  color: white;
}
.trait {
    margin-top: 35px;
  margin-left: 5%;
  width: 90%;
  height: 2px;
  background: white;
}
p {
    margin-top: 35px;
  width: 30vw;
  color: white;
}
.droit {
    margin-top: 35px;
    margin-left: 200px;
  width: 55vw;
}
.er {
  display: flex;
  
}
.montagne {
    margin-left: 15px;
  width: 90px;
}
h3 {
    
  margin-left: 15px;
}
</style>
