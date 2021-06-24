<template>
    <div>
        <nav-bar />

        <div class="container section">
            <div class="columns">
                <div class="column is-8">
                    <slot />
                </div>
                <p>rhghrgnyrsnytr</p>
                <div class="column is-4">
                    <side-bar />
                </div>
            </div>
        </div>
        
        <footer-bar />
    </div>
</template>
<script>
export default {

    data(){
        return {
            

        }
    }
}
</script>
