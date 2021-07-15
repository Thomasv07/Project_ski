<template>
  <div class="export">
    <h2>Création d'événement</h2>
    <div class="twobox">
      <form
        @submit="Formtournament"
        action="/event"
        method="POST"
        enctype="multipart/form-data"
        class="firstcard"
      >
        <div class="input">
          <label for="tournament">Evenement:</label>
          <input
            v-model="tournament.city"
            class="epreuve"
            type="text"
            name="city"
            id="city"
            placeholder="Nom de l'épreuve"
            required
          />
          <input
            v-model="tournament.date"
            class="epreuve"
            type="date"
            name="date"
            id="date"
            required
          />
        </div>
        <div class="addpax">
          <button type="submit" name="submit" id="add">
            Créer un évenement
          </button>
        </div>
      </form>
      <form
        @submit="Formpax"
        action="/insert"
        method="POST"
        enctype="multipart/form-data"
        class="secondcard"
      >
        <div class="titlecat2">
          <p>Ajouter des participants :</p>
          <div>
            <select v-model="form.category" name="category" id="category">
              <option disabled>Choisir une catégorie</option>
              <option
                v-for="category in categories"
                :key="category.id_category"
                :value="category.id_category"
              >
                {{ category.type }}
              </option>
            </select>
            <div class="allinput">
              <div class="firstinput">
                <input
                  v-model="form.lastname"
                  class="input2"
                  type="text"
                  name="lastname"
                  id="lastname"
                  placeholder="Nom"
                  required
                />
                <input
                  v-model="form.email"
                  class="input2"
                  type="text"
                  name="email"
                  id="email"
                  placeholder="Email"
                  required
                />
              </div>
              <div class="secondinput">
                <input
                  v-model="form.firstname"
                  class="input2"
                  type="text"
                  name="firstname"
                  id="firstname"
                  placeholder="Prénom"
                  required
                />
                <input
                  v-model="form.dob"
                  class="input2"
                  type="date"
                  name="dob"
                  id="dob"
                  required
                />
              </div>
            </div>
            <div class="picture">
              <label for="imgInp">
                <img id="preview" src="../assets/tof.png" />
              </label>
              <input
                @change="processFile($event)"
                class="input2"
                hidden
                type="file"
                name="picture"
                accept=".jpg, .jpeg, .gif, .png"
                id="imgInp"
              />
            </div>
          </div>
        </div>
        <div class="addpax">
          <button type="submit" name="submit" id="add">
            Ajouter un participant
          </button>
        </div>
      </form>
    </div>
    <div class="submit">
      <input
        class="exp"
        type="button"
        @click="exportexcel()"
        value="Exporter le fichier excel"
      />
    </div>
    <table>
      <thead>
        <tr>
          <th>Numéro de dossard</th>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Date de naissance</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="participant in participants"
          :key="participant.id_participant"
        >
          <td>{{ participant.number_sign }}</td>
          <td>{{ participant.firstname }}</td>
          <td>{{ participant.lastname }}</td>
          <td class="date">{{ participant.dob }}</td>
          <td>{{ participant.email }}</td>
          <td>
            <a @click="del(participant.id_participant)"> Suppression </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import ApiService from "../services/api.services";
const axios = require("axios");

const apiservice = new ApiService();

export default {
  name: "Export",
  components: {},
  data() {
    return {
      data: "",
      categories: null,
      participants: null,
      tournament: {
        city: "",
        date: "",
      },
      form: {
        category: "",
        firstname: "",
        lastname: "",
        email: "",
        dob: "",
        picture: "",
      },
    };
  },
  mounted() {
    this.getSelect();
    this.getAll();
  },
  methods: {
    async getSelect() {
      const res = await apiservice.getSelect();
      const data = await res.json();
      this.categories = data;
    },
    async getAll() {
      const res = await apiservice.getAll();
      const data = await res.json();
      this.participants = data;
    },
    Formtournament: function (e) {
      const requestOptions = {
        method: "POST",
        body: JSON.stringify(this.tournament),
      };
      fetch("http://projet:8080/Project_ski/API/event", requestOptions);
      e.preventDefault();
      console.log(this.tournament);
    },
    processFile(event) {
      const image = event.target.files[0];
      if (image) {
        var p = document.getElementById('preview');
        p.src = URL.createObjectURL(image);
      }
      this.createBase64Image(image);
    },
    createBase64Image(fileObject) {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.form.picture = e.target.result;
      };
      reader.readAsDataURL(fileObject);
    },
    Formpax: function (e) {
      const requestOptions = {
        method: "POST",
        headers: {
          "Content-Type": "multipart/form-data",
        },
        mode: "cors",
        body: JSON.stringify(this.form),
      };
      fetch("http://projet:8080/Project_ski/API/insert", requestOptions);
      e.preventDefault();
    },
    async exportexcel() {
      const responseExport = await axios.get(
        "http://projet:8080/Project_ski/API/export"
      );
      this.data = responseExport.data;
      var link = document.createElement("a");
      link.setAttribute("href", this.data);
      link.setAttribute("download", "evenement.xlsx");

      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    },
    del(id) {
      if (confirm("Voulez vous supprimer ce participant?")) {
        fetch("http://projet:8080/Project_ski/API/delete" + id);
      }
    },
  },
};
</script>

<style>
h2 {
  display: flex;
  align-items: center;
  font-size: 50px;
  flex-direction: column;
}
h2::after {
  content: " ";
  width: 25%;
  height: 2px;
  background: rgb(0, 0, 0);
}
.twobox {
  display: flex;
  justify-content: center;
}
.firstcard {
  background-image: url("../assets/titre.png");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  width: 403px;
  height: 600px;
}
.input {
  display: flex;
  margin-left: 35%;
  flex-direction: column;
  width: 150px;
  margin-top: 250px;
}
input:placeholder-shown {
  border: 2px solid red !important;
}
input[type="text"]:valid {
  border: 2px solid green;
}

.input2 {
  padding: 5px 5px 5px 5px;
}
label {
  display: flex;
  justify-content: center;
  margin-bottom: 35px;
  font-size: 30px;
  text-decoration: underline;
}
.epreuve {
  margin-bottom: 75px;
}
#city {
  padding: 7px 5px 7px 5px;
}
#date {
  padding: 5px;
}
.secondcard {
  background-image: url("../assets/neige.jpg");
  width: 50%;
  height: 600px;
}
.container {
  width: 100%;
}
.titlecat2 {
  text-align: center;
  font-size: 30px;
  height: 500px;
}
.titlecat {
  text-align: center;
  font-size: 30px;
  height: 500px;
  margin-top: 100px;
}
.allinput {
  display: flex;
  flex-direction: column;
}

.firstinput {
  display: flex;
  justify-content: space-between;
  padding: 0 15%;
  margin-top: 50px;
}
.secondinput {
  display: flex;
  justify-content: space-between;
  padding: 0 15%;
  margin-top: 50px;
}
#dob {
  width: 168.5px;
}
.picture {
  display: flex;
  justify-content: center;
  margin-top: 50px;
}
.picture > label > img {
  cursor: pointer;
  width: 150px;
  height: 150px;
  object-fit: scale-down;

}
.addpax {
  display: flex;
  justify-content: center;
  margin-bottom: 50px;
}
.addpax > button {
  cursor: pointer;
}
.submit {
  display: flex;
  justify-content: center;
  margin: 50px 0 50px 0;
}
#add {
  background-color: #c7260c;
  border: 3px solid #c7260c;
  color: white;
  font-weight: bold;
  border-radius: 10px;
  padding: 10px 50px 10px 50px;
}
.exp {
  background-color: #c7260c;
  cursor: pointer;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 10px;
  padding: 10px 50px 10px 50px;
}
a {
  text-decoration: none;
  color: rgb(0, 0, 0);
  transition: color 0.2s ease-out;
  margin: 0 10px 0 10px;
}
a:hover {
  color: #c7260c;
  cursor: pointer;
}
table {
  margin: 20px auto 100px auto;
  padding: 0;
}
td {
  padding: 20px 5px;
  height: 30px;
  transition: all 0.3s ease-out;
  border-top: 1px solid rgb(0, 0, 0);
}
td:hover {
  height: 70px;
}
table {
  border: medium solid #c7260c;
  border-collapse: collapse;
  width: 50%;
}
th {
  font-family: monospace;
  border: thin solid #6495ed;
  min-width: 100px;
  padding: 5px;
  background-color: #002450;
  padding: 5px;
  background-color: #002450;
  color: white;
}
td {
  font-family: sans-serif;
  border: thin solid #6495ed;
  width: 50%;
  padding: 5px;
  text-align: center;
  background-color: #ffffff;
}
</style>
