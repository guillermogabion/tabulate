    <template>
    <v-app id="inspire">
        <app-nav-bar :mini="mini" @changeStatusDrawer="mini = !mini"></app-nav-bar>
        <app-bar @changeStatusDrawer="mini = !mini"></app-bar>
        <app-main></app-main>
    </v-app>
    </template>

    <script>
    import AppBar from "../layouts/includes/Header.vue"
    import AppNavBar from "../layouts/includes/Sidebar.vue"
    import AppMain from "../layouts/includes/Base.vue"

    export default {
        data() {
            return {
                mini: true
            }
           
        },
        components:{
             AppBar,
             AppMain,
             AppNavBar   
        },
    }

    </script>

    <!-- <template>
        <div>
            I am Main
        </div>
    </template> -->
<style scoped>
.wrap {
    background-color: green;
}
</style>