import VueRouter from "vue-router";
let routes=[
    {
        path:"/",
        redirect:'/fav'
    },
    {
        path:"/fav",
        component:require("./components/Fav")
    },
    {
        path:"/post",
        component:require("./components/Post")
    },
    {
        path:"/msg",
        component:require("./components/msg")
    },
    {
        path:"/about",
        component:require("./components/about")
    },
    {
        path:"/detail",
        name:'detail',
        component:require("./components/Detail")
    },
    {
        path:"/searchPost",
        name:'searchPost',
        component:require("./components/searchPost")
    },
]
export default new VueRouter({
    routes
})