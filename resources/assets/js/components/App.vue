<template>
    <div id="app" >
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: [],
                day: 0,
                all: 0,
                max:0,
                min:0
            }
        },
        created() {

        },
        mounted() {

        }
    }
</script>
