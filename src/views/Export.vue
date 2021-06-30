<template>
  <div class="export">
    <h2>Création d'événement</h2>

    <form action="./insert" method="POST" enctype="multipart/form-data">
      <div class="twobox">
        <div class="firstcard">
          <label for="tournament">Evenement:</label>
          <input
            type="text"
            name="city"
            id="city"
            placeholder="Nom de l'épreuve"
            required
          />
          <input type="date" name="date" id="date" required />
        </div>
        <section class="secondcard">
          <p>Ajouter des participants :</p>
          <div>
            <div>
              <input
                type="file"
                name="picture[]"
                accept=".jpg, .jpeg, .gif, .png"
                id="imgInp"
              />
            </div>
            <div>
              <input
                type="text"
                name="firstname[]"
                id="firstname"
                placeholder="Prénom"
                required
              />
            </div>
            <div>
              <input
                type="text"
                name="lastname[]"
                id="lastname"
                placeholder="Nom"
                required
              />
            </div>
            <div>
              <input type="date" name="dob[]" id="dob" required />
            </div>
            <div>
              <input
                type="text"
                name="email[]"
                id="email"
                placeholder="Email"
                required
              />
            </div>
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
        </section>
        <div id="container"></div>
        <button type="button" @click="BtnPax" id="add">
          Ajouter un participant
        </button>
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
  props: {
    type: String,
  },
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

      let select = document.createElement("select");
      select.name = "category[]";
      div.append(select);
      this.categories.forEach((element) => {
        let option = document.createElement("option");
        option.value = element.id_category;
        option.text = element.type;
        select.appendChild(option);
      });
    },
  },
};
</script>

<style scoped>
.twobox {
  display: flex;
  justify-content: space-around;
}
.firstcard {
}
.secondcard {
}
</style>
