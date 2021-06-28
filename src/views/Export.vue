<template>
  <div class="export">
    
    <h2>Formulaire</h2>
    <form action="./insert" method="POST" enctype="multipart/form-data">
      <div>
        <label for="tournament">Evenement:</label>
        <input
          type="text"
          name="city"
          id="city"
          placeholder="Nom de l'épreuve"
          required/>
        <input type="date" name="date" id="date" required />
      </div>
      <section class="participant">
        <p>Ajouter des participants :</p>
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
          <option value="">
          </option>
        </select>
      </section>
      <BtnPax  v-on:click="btn += 1"/>
      <input type="submit" name="submit" value="Valider" />
    </form>
    
  </div>
</template>

<script>

// @ is an alias to /src

import BtnPax from "@/components/BtnPax.vue";



export default {
  name: "Export",
  components: {
    BtnPax,
  },
  data() {
     return {
      btn: 0,
    };
  },
    methods: {
    async AddPax() {
     this.btn ++
    },
   },
};
</script>
