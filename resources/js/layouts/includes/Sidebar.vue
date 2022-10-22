<template>
   <v-navigation-drawer
   app
   v-model = "mini"
   persistent
   >
    <v-list-item class="px-2 pt-2">
        <v-img
        color="primary"
        size="40"
        :src="logo"
        >
        </v-img>
    </v-list-item>
    <v-list
    dense
    padding="20px"
    >
        <v-list-item
        v-for="item in items"
        :key="item.title"
       
        :to="item.route"
        class="text-decoration-none spacing"
        >
        <v-icon
        medium
        color="darken-2"
        class="pr-10"
        >
        {{ item.icon }}
        </v-icon>
        <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item-content>
        </v-list-item>
    </v-list>
    <!-- <template v-for="item in items">
       <v-list-item
       :key ="item.title"
       >

       </v-list-item>
    </template> -->

   </v-navigation-drawer>
</template>
<script>
import logo from '../../assets/sidelogo.png'
export default {
    data : () => ({
        logo,
        items : [
            {title : 'Dashboard', icon: 'mdi-view-dashboard', route: '/dashboard'},
            {title : 'Employees', icon: 'mdi mdi-account-group', route: '/employee'},
            {title : 'About', icon: 'mdi-view-dashboard', route: '/about'}
        ]
    }),

    props : {
        mini : {
            require: true,
            type: Boolean
        }
    },
    computed : {
        activeRoute () {
            return this.$route
        },
        mini_status: { 
            get : function () {
                return this.mini
            },
            set: function (value) {
                console.log(value, "status")
                this.$emit('changeStatusDrawer')
            }
        }
    },
    methods : {
        checkIfActive(route){
            let route_text = route.split("/")
            return route_text[1].includes(this.activeRoute.name)
        }
    }
}
</script>
<style>
.spacing {
    padding-top: 0.5em;
}
.v-list-item--active {
    background-color: rgb(66, 122, 10);
    color: #f4f4f4 !important;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
    border-top-right-radius: 10% 50%;
    border-bottom-right-radius: 10% 50%;
    margin: 4%;
    padding-bottom: 2%;
}
</style>