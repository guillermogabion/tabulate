<template>
    <v-main
    class="bg-gray-200 h-full overflow-auto no-scrollbar"
    style="height: 100vh; max-height: 100vh;"
    >
        <v-container>
            <transition>
                <router-view></router-view>
            </transition>
        </v-container>
    </v-main>    

</template>