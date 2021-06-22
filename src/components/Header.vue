<template>
    <div>
        <div class="title">
            <div>
                <h3>Snow<br>generation</h3>
                <img :src="require('../assets/mountain.png')" />
            </div>
            
        <nav>
            <a v-bind:href="messages"> nabil </a>
            <a v-bind:href="messages"> est </a>
            <a v-bind:href="messages"> méchant </a>
        </nav>
        </div>
        
        
        <div class="trait"></div>
        <img class="snow" :src="require('../assets/couv.png')" />
    </div>
</template>

<script>
export default {
    data(){
        return {
            messages:["Header.vue"]
            
        }
    }
}
</script>

<style scoped>
    .title {
        display: flex;
    }
    nav {
        display: flex;
        justify-content: space-evenly;
        width: 100vw;
    }
    a {
        font-size: 40px;
        color: red;
        text-decoration: none;
    }
    .snow {
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
    }
    img {
        width: 90px;
    }
    h3 {
        margin: 0;
    }
    .trait {
        width  : 100%;
        height : 8px;
        background : red;
    }
</style>