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
    >
        <v-list-item
        v-for="item in items"
        :key="item.title"
        color="secondary"
        :to="item.route"
        class="text-decoration-none"
        >
        <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item-content>
        </v-list-item>
    </v-list>

   </v-navigation-drawer>
</template>
<script>
import logo from '../../assets/sidelogo.png'
export default {
    data : () => ({
        logo,
        items : [
            {title : 'Dashboard', icon: 'mdi-view-dashboard', route: '/dashboard'},
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