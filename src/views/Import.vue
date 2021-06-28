<template>
  <div class="import">
    <Header />
    <h2>Importer un fichier excel</h2>

    <form action="./import" method="POST" enctype="multipart/form-data">
      <input type="file" name="import_file" />
      <input type="submit" name="import_file_btn" value="Importer" />
    </form>
  </div>
</template>
<script>
// @ is an alias to /src
import Header from "@/components/Header.vue";


export default {
  name: "Import",
  components: {
    Header,
  }
};

</script>