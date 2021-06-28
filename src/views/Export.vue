<template>
  <div class="export">
    <Header />
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
      <div id="container"></div>
      <input type="button" id="add" value="+" />
      <input type="submit" name="submit" value="Valider" />
    </form>
  </div>
</template>
<script>


let container = document.getElementById("container");
let btn = document.getElementById("add");
let i = 0;

btn.addEventListener("click", function() {
    i++;

    let div = document.createElement("div");
    container.prepend(div);

    let inputImg = document.createElement("input");
    inputImg.type = 'file';
    inputImg.name = 'picture[]';
    inputImg.accept = '.jpg, .jpeg, .gif, .png';
    div.prepend(inputImg);

    let firstname = document.createElement("input");
    firstname.type = 'text';
    firstname.name = 'firstname[]';
    firstname.placeholder = 'Prénom';
    div.append(firstname);

    let lastname = document.createElement("input");
    lastname.type = 'text';
    lastname.name = 'lastname[]';
    lastname.placeholder = 'Nom';
    div.append(lastname);

    let date = document.createElement("input");
    date.type = 'date';
    date.name = 'dob[]';
    div.append(date);

    let email = document.createElement("input");
    email.type = 'text';
    email.name = 'email[]';
    email.placeholder = 'Email';
    div.append(email);

    let select = document.createElement("select");
    select.name = 'category[]';
    div.append(select);
    let arrayv= ["1", "2", "3", "4", "5", "6"]
    let arrayt = ["M1", "M2", "M3", "Sénior", "Snow", "Nouvelle Glisse"]
    for (var j = 0; j < 6; j++) {
        let option = document.createElement("option");
        option.value = arrayv[j];
        option.text = arrayt[j];
        select.appendChild(option);
    }

});

// @ is an alias to /src
import Header from "@/components/Header.vue";


export default {
  name: "Export",
  components: {
    Header,
    
  },
  
};
</script>
