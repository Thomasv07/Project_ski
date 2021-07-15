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
      <p class="para">
        Snow Generations, l’histoire faite dengagement, de partage et
        d'innovation. 17000 moniteurs Snow Generation autour de la France,
        réunis autour des mêmes valeurs. Rendant la montagne accessible à tous,
        Snow Generation accueille tous le monde dans des compétions pour tous.
      </p>
    </div>
    <div class="trait"></div>
    <div class="er">
      <div>
        <img class="montagne" :src="require('../assets/logoski.png')" />
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
@media screen and (max-width: 1310px) {
  p.droit {
    display: flex;
    flex-direction: column;
    text-align: center;
    align-items: center;
    text-align: center;
    width: 100vw;
  }
  div.container {
    margin: 0 0 0 10px;
  }
}
@media screen and (max-width: 950px) {
  div.container {
    margin: 0 0 0 50px;
  }
}
@media screen and (max-width: 850px) {
  div.container {
    justify-content: unset;
    margin: 0 15px;
  }
  div.discipline {
    margin: 0 20px;
  }
  div.evenement {
    margin: 0 20px;
  }
  p.para {
    width: 325px;
  }
  p.gras {
  }
}
@media screen and (max-width: 700px) {
  
  div.evenement {
  }
  div.container {
    flex-direction: column;
    display: flex;
    align-items: center;
  }
  p.para {
    display: flex;
    width: 500px;
  }
}
@media screen and (max-width: 520px) {
  p.para {
    width: 350px;
    margin: 15px 60px 0 60px;
  }
}
@media screen and (max-width: 400px) {
  p.para {
    width: 250px;
    margin: 15px 60px 0 60px;
  }
  div.er {
    display: flex;
    align-items: center;
    
  }
  p.droit {
    font-size: 12px;
    margin: 0;
  }
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
.gras {
  margin-top: 35px;
  width: 30vw;
  color: white;
}
.para {
  margin-top: 35px;
  width: 30vw;
  color: white;
}
.droit {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 55vw;
  margin-top: 35px;
  color: white;
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
