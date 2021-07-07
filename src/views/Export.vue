<template>
  <div class="export">
    <h2>Création d'événement</h2>

    <form
      @submit="checkForm"
      action="/insert"
      method="POST"
      enctype="multipart/form-data"
    >
      <div class="twobox">
        <div class="firstcard">
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
        </div>
        <div class="secondcard">
          <div class="titlecat2">
            <p>Ajouter des participants :</p>
            <div class="">
              <select v-model="tournament.form.category" name="category" id="category">
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
                    v-model="tournament.form.lastname"
                    class="input2"
                    type="text"
                    name="lastname"
                    id="lastname"
                    placeholder="Nom"
                    required
                  />
                  <input
                    v-model="tournament.form.email"
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
                    v-model="tournament.form.firstname"
                    class="input2"
                    type="text"
                    name="firstname"
                    id="firstname"
                    placeholder="Prénom"
                    required
                  />
                  <input
                    v-model="tournament.form.dob"
                    class="input2"
                    type="date"
                    name="dob"
                    id="dob"
                    required
                  />
                </div>
              </div>
              <div class="picture">
                <label for="imgInp"><img src="../assets/tof.png" /></label>
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
          <div id="container"></div>
          <div class="addpax">
            <button type="button" @click="BtnPax" id="add">
              Ajouter un participant
            </button>
          </div>
        </div>
      </div>
      <div class="submit">
        <input class="exp" type="submit" name="submit" value="Valider" />
      </div>
    </form>
  </div>
</template>

<script>
import ApiService from "../services/api.services";

const apiservice = new ApiService();

export default {
  name: "Export",
  components: {},
  data() {
    return {
      categories: null,
      tournament: {
        city: "",
        date: "",
        form: [{
          category: "",
          firstname: "",
          lastname: "",
          email: "",
          dob: "",
          picture: "",
        }],
      },
    };
  },
  mounted() {
    this.getSelect();
  },
  methods: {
    async getSelect() {
      const res = await apiservice.getSelect();
      const data = await res.json();
      this.categories = data;
    },
    processFile(event) {
      const image = event.target.files[0];
      this.createBase64Image(image);
    },
    createBase64Image(fileObject) {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.tournament.form.picture = e.target.result;
      };
      reader.readAsDataURL(fileObject);
    },
    checkForm: function (e) {
      const requestOptions = {
        method: "POST",
        headers: {
          "Content-Type": "multipart/form-data",
          "Access-Control-Allow-Methods": "GET,HEAD,OPTIONS,POST,PUT",
          "Access-Control-Allow-Origin": "*",
        },
        mode: "cors",
        body: JSON.stringify(this.tournament)
      };
      fetch("http://projet:8080/Project_ski/API/insert", requestOptions);
      e.preventDefault();
      console.log(this.tournament);
    },
    BtnPax: function () {
      var container = document.getElementById("container");
      let div = document.createElement("div");
      div.className = "titlecat";
      container.prepend(div);

      let select = document.createElement("select");
      select.name = "category";
      select.setAttribute("v-model", "tournament.form.category");

      div.append(select);
      this.categories.forEach((element) => {
        let option = document.createElement("option");
        option.value = element.id_category;
        option.text = element.type;
        select.appendChild(option);
      });
      let lastnamediv = document.createElement("div");
      lastnamediv.className = "firstinput";
      div.append(lastnamediv);

      let lastname = document.createElement("input");
      lastname.type = "text";
      lastname.name = "lastname";
      lastname.className = "input2";
      lastname.placeholder = "Nom";
      lastname.setAttribute("v-model", "tournament.form.lastname");
      lastnamediv.prepend(lastname);

      let email = document.createElement("input");
      email.type = "text";
      email.name = "email[]";
      email.className = "input2";
      email.placeholder = "Email";
      email.setAttribute("v-model", "tournament.form.email");
      lastnamediv.append(email);

      let firstnamediv = document.createElement("div");
      firstnamediv.className = "secondinput";
      div.append(firstnamediv);

      let firstname = document.createElement("input");
      firstname.type = "text";
      firstname.name = "firstname[]";
      firstname.className = "input2";
      firstname.placeholder = "Prénom";
      firstname.setAttribute("v-model", "tournament.form.firstname");
      firstnamediv.append(firstname);

      let date = document.createElement("input");
      date.type = "date";
      date.name = "dob[]";
      date.className = "input2";
      date.id = "dob";
      date.setAttribute("v-model", "tournament.form.dob");
      firstnamediv.append(date);

      let inputImgdiv = document.createElement("div");
      inputImgdiv.className = "picture";
      div.append(inputImgdiv);

      let inputImg = document.createElement("input");
      inputImg.type = "file";
      inputImg.name = "picture";
      inputImg.className = "picture";
      inputImg.onchange='processFile($event)';
      inputImg.accept = ".jpg, .jpeg, .gif, .png";
      inputImgdiv.append(inputImg);
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
  overflow: auto;
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
.addpax {
  display: flex;
  justify-content: center;
  margin-bottom: 50px;
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
</style>
