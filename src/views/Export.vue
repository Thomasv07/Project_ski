<template>
  <div class="export">
    <h2>Création d'événement</h2>

    <form action="./insert" method="POST" enctype="multipart/form-data">
      <div class="twobox">
        <div class="firstcard">
          <div class="input">
            <label for="tournament">Evenement:</label>
            <input
              class="epreuve"
              type="text"
              name="city"
              id="city"
              placeholder="Nom de l'épreuve"
              required
            />
            <input class="epreuve" type="date" name="date" id="date" required />
          </div>
        </div>
        <div class="secondcard">
          <div class="titlecat">
            <p>Ajouter des participants :</p>
            <select name="category[]" id="category">
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
                class="input2"
                type="text"
                name="lastname[]"
                id="lastname"
                placeholder="Nom"
                required
              />
              <input
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
                class="input2"
                type="text"
                name="firstname[]"
                id="firstname"
                placeholder="Prénom"
                required
              />
              <input
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
              class="input2"
              hidden
              type="file"
              name="picture[]"
              accept=".jpg, .jpeg, .gif, .png"
              id="imgInp"
            />
          </div>

          <div id="container"></div>
          <button type="button" @click="BtnPax" id="add">
            Ajouter un participant
          </button>
        </div>
      </div>
      <input type="submit" name="submit" value="Valider" />
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
    BtnPax: function () {
      var container = document.getElementById("container");
      let div = document.createElement("div");
      container.prepend(div);

      let inputImg = document.createElement("input");
      inputImg.type = "file";
      inputImg.name = "picture[]";
      inputImg.accept = ".jpg, .jpeg, .gif, .png";
      div.prepend(inputImg);

      let firstname = document.createElement("input");
      firstname.type = "text";
      firstname.name = "firstname[]";
      firstname.placeholder = "Prénom";
      div.append(firstname);

      let lastname = document.createElement("input");
      lastname.type = "text";
      lastname.name = "lastname[]";
      lastname.placeholder = "Nom";
      div.append(lastname);

      let date = document.createElement("input");
      date.type = "date";
      date.name = "dob[]";
      div.append(date);

      let email = document.createElement("input");
      email.type = "text";
      email.name = "email[]";
      email.placeholder = "Email";
      div.append(email);
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
.input2 {
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
}
</style>
