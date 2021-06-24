import Vue from 'vue'



Vue.use(Router);

export default new Router({
    mode: "history",

    routes: [
        {
            path: "/",
            name: "home",
            meta: { layout: "no-sidebar" },
            component: require("@/pages/Home.vue").default //load sync home
        },
        {
            path: "/photos",
            name: "photo",
            component: () => import("@/pages/Photos.vue") //load sync home
        },
        {
            path: "/about-us",
            name: "about",
            meta: { layout: "no-sidebar" },
            component: () => import("@/pages/About.vue") //load sync home
        },
        {
            path: "/story/:id",
            name: "post",
            component: () => import("@/pages/Post.vue") //load sync home
        },
        {
            path: "*",
            name: "404",
            component: require("@/pages/404.vue").default //load sync home
        },
    ]
})