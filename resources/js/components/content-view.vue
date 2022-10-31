<template>
    <div
    class="flex flex-row gap-2 bg-transparent"
    style="height: 90vh; max-height: 90vh;"
    >
        <v-navigation-drawer permanent>
            <v-list nav>
                <template>
                    <v-list-item
                    v-for="item in menus"
                    link
                    :key="item.title"
                    :to="item.route"
                    @click.stop="$router.push(item.route)"
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
                
                </template>
            </v-list>
        </v-navigation-drawer>
        <div class="w-full bg-white p-4 overflow-auto">
            <transition name="fade" maode="out-in">
                <router-view></router-view>
            </transition>
        </div>
        
    </div>
</template>
<script>
export default {
    data() {
        return {
            menus : [
                {title : 'Menu1'},
                {title : 'Menu2'},
                {title : 'Menu3'},
            ]
        }
    },
}
</script>