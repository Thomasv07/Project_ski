<template>
  <div class="import">
   

    <h2>Importer un fichier excel</h2>

    <form action="./import" method="POST" enctype="multipart/form-data">
      <input type="file" name="import_file" />
      <input type="submit" name="import_file_btn" value="Importer" />
    </form>
    
  </div>
</template>
<script>
// @ is an alias to /src



export default {
  name: "Import"
};

</script>