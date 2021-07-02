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
              v-model="form.city"
              class="epreuve"
              type="text"
              name="city"
              id="city"
              placeholder="Nom de l'épreuve"
              required
            />
            <input
              v-model="form.date"
              class="epreuve"
              type="date"
              name="date"
              id="date"
              required
            />
          </div>
        </div>
        <div class="secondcard">
          <div class="titlecat">
            <p>Ajouter des participants :</p>
            <select v-model="form.category" name="category[]" id="category">
              <option
                v-for="category in categories"
                :key="category.id_category"
                :value="category.id_category"
              >
                {{ category.type }}
              </option>
            </select>
          </div>
          <div class="allinput">
            <div class="firstinput">
              <input
                v-model="form.lastname"
                class="input2"
                type="text"
                name="lastname[]"
                id="lastname"
                placeholder="Nom"
                required
              />
              <input
                v-model="form.email"
                class="input2"
                type="text"
                name="email[]"
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
                name="firstname[]"
                id="firstname"
                placeholder="Prénom"
                required
              />
              <input
                v-model="form.dob"
                class="input2"
                type="date"
                name="dob[]"
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
              name="picture[]"
              accept=".jpg, .jpeg, .gif, .png"
              id="imgInp"
            />
          </div>

          <div class="container" id="container"></div>
          <div class="addpax">
            <button type="button" @click="BtnPax" id="add">
              Ajouter un participant
            </button>
          </div>
        </div>
      </div>
      <div class="submit">
        <input type="submit" name="submit" value="Valider" />
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
      form: [{
        city: "",
        date: "",
        category: [],
        firstname: [],
        lastname: [],
        email: [],
        dob: [],
        picture: []
      }],
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
    this.picture = event.target.files[0]
  },
    checkForm: function (e) {
      const requestOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json","Access-Control-Allow-Methods": "GET,HEAD,OPTIONS,POST,PUT",  "Access-Control-Allow-Origin": '*' },
        mode: 'cors',
        body: JSON.stringify(this.form),
        
      };
      fetch("http://projet:8080/Project_ski/API/insert", requestOptions);
      e.preventDefault();
      console.log(this.form);
    },
    BtnPax: function () {
      var container = document.getElementById("container");
      let div = document.createElement("div");
      container.prepend(div);

      let select = document.createElement("select");
      select.name = "category[]";
      select.setAttribute("v-model", "form.category");
      div.append(select);
      this.categories.forEach((element) => {
        let option = document.createElement("option");
        option.value = element.id_category;
        option.text = element.type;
        select.appendChild(option);
      });

      let lastname = document.createElement("input");
      lastname.type = "text";
      lastname.name = "lastname[]";
      lastname.placeholder = "Nom";
      lastname.setAttribute('v-model','form.lastname');
      div.append(lastname);

      let firstname = document.createElement("input");
      firstname.type = "text";
      firstname.name = "firstname[]";
      firstname.placeholder = "Prénom";
      firstname.setAttribute('v-model','form.firstname');
      div.append(firstname);

      let email = document.createElement("input");
      email.type = "text";
      email.name = "email[]";
      email.placeholder = "Email";
      email.setAttribute('v-model','form.email');
      div.append(email);

      let date = document.createElement("input");
      date.type = "date";
      date.name = "dob[]";
      date.setAttribute('v-model','form.dob');
      div.append(date);

      let inputImg = document.createElement("input");
      inputImg.type = "file";
      inputImg.name = "picture[]";
      inputImg.accept = ".jpg, .jpeg, .gif, .png";
      div.append(inputImg);
    },
  },
};
</script>

<style scoped>
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
  border: 2px solid red;
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
  background-color: #b2cee5;
  width: 50%;
}
.titlecat {
  text-align: center;
  font-size: 30px;
}
.allinput {
  display: flex;
  flex-direction: column;
}

.firstinput {
  display: flex;
  justify-content: space-around;
  margin-top: 50px;
}
.secondinput {
  display: flex;
  justify-content: space-around;
  margin-top: 50px;
}
.picture {
  display: flex;
  justify-content: center;
  margin-top: 75px;
}
.addpax {
  display: flex;
  justify-content: center;
}
.submit {
  display: flex;
  justify-content: center;
  margin: 50px 0 50px 0;
}
</style>
