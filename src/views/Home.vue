<template>
  <div class="home">
    
    <p>Home</p>
    
  </div>
</template>

<script>
// @ is an alias to /src
import ApiService from "../services/api.services";



const apiservice = new ApiService();

export default {
name: "Home",
components: {

},
props: {
firstname: String,
lastname: String,
},
data() {
return {
data: null,
};
},
methods: {
async getAll(pax) {
const res = await apiservice.getAll(pax);
const data = await res.json();
this.data = data.results;
},
},
};
</script>

<style scoped>
  
</style>
