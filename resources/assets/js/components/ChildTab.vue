<template>
    <li @click="fn" >
        <router-link  :to="'/'+mark" :class="{active:bool}">
            <slot name="icon"></slot>
            <p>{{title}}</p>
        </router-link>
    </li>

</template>

<script>
    export default {
        name: "ChildTab",
        props:['title','mark','sel'],
        methods:{
            fn:function () {
                console.log(423);
                this.$emit('res',this.mark)
            }
        },
        computed:{
            bool:function () {
                return this.sel == this.mark;
            }
        }
    }
</script>

<style scoped>

</style>












