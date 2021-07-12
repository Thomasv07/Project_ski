<template>
  <div class="import">
    <form
      action="/import"
      method="POST"
      enctype="multipart/form-data"
      @submit.prevent="checkForm"
    >
      <input
        id="addfiles"
        hidden
        type="file"
        name="import_file"
        @change="processFile($event)"
      />
      <div class="formimport">
        <h2>Importer un fichier excel</h2>
        <label class="addfiles" for="addfiles">Choisir un fichier</label>
        <p><span>Fichier prise en charge</span> : xls, csv, xlsx</p>
        <input
          class="btnimport"
          type="submit"
          name="import_file_btn"
          value="Importer"
        />
      </div>
    </form>
  </div>
</template>
<script>
export default {
  name: "Import",
  data() {
    return {
      file: {},
    };
  },
  methods: {
    processFile(event) {
      const file = event.target.files[0];
      this.createBase64Image(file);
    },
    createBase64Image(fileObject) {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.file = e.target.result;
      };
      reader.readAsDataURL(fileObject);
    },
    checkForm: async function () {
      const requestOptions = {
        method: "POST",
        headers: {
          "Content-Type": 'multipart/form-data',
        },
        mode: "cors",
        body: JSON.stringify(this.file)
      };
      await fetch("http://projet:8080/Project_ski/API/import", requestOptions);
     
    },
  },
};
</script>

<style scoped>
.formimport {
  display: flex;
  align-items: center;
  flex-direction: column;
}
h2 {
  margin-bottom: 50px;
}
span {
  text-decoration: underline;
}
.addfiles {
  background-color: #c7260c;
  cursor: pointer;
  color: white;
  font-weight: bold;
  border-radius: 10px;
  padding: 10px 50px 10px 50px;
}
.addfiles:hover {
  color: white;
  border-radius: 10px;
  padding: 10px 50px 10px 50px;
}
.btnimport {
  background-color: #c7260c;
  cursor: pointer;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 10px;
  padding: 10px 50px 10px 50px;
  margin: 75px 0 150px 0;
}
</style>
