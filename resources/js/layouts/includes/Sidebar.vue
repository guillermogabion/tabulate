<template>
   <v-navigation-drawer
   app
   v-model = "mini"
   persistent
   >
    <v-list-item class="px-2 pt-2">
        <v-img
        color="primary"
        size="56"
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
        link
        >
        <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item-content>
        </v-list-item>
    </v-list>

   </v-navigation-drawer>
</template>
<script>
export default {
    data : () => ({
        items : [
            {title : 'Dashboard', route: '/dashboard'}
        ]
    }),

    props : {
        mini : {
            require: true,
            type: Boolean
        }
    },
    computed : {
        mini_status: { 
            get : function () {
                return this.mini
            },
            set: function (value) {
                console.log(value, "status")
                this.$emit('changeStatusDrawer')
            }
        }
    }
}
</script>