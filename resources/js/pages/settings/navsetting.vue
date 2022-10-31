<template>
    <div
    class="flex flex-row gap-2 bg-transparent"
    style="height: 90vh; max-height: 90vh; padding-left: 5em;"
    >
        <v-navigation-drawer permanent>
            <v-list nav>
                <v-list-item
                v-for="item in menus"
                link
                :key="item.title"
                :to="item.route"
                >
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>
                            {{item.title}}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <div class="w-full bg-white p-4 overflow-auto">
            <transition name="fade" mode="out-in">
                <router-view name="content" />
            </transition>
        </div>
        
    </div>
</template>
<script>
export default {
    data() {
        return {
            menus : [
                {title : 'Items', icon: "mdi-bullseye-arrow", route: '/setting/item'  },
                {title : 'Delivery',  icon: "mdi-bullseye-arrow", route: '/setting/delivery' },
             
            ]
        }
    },
}
</script>