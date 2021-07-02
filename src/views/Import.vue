<template>
  <div class="import">
    <form action="./import" method="POST" enctype="multipart/form-data">
      <input id="addfiles" hidden type="file" name="import_file" />
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
// @ is an alias to /src

export default {
  name: "Import",
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
