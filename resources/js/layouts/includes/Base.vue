<template>
    <v-main
    class="bg-gray-200 h-full overflow-auto no-scrollbar"
    style="height: 100vh; max-height: 100vh;"
    >
        <v-container
       
        >
            <v-scroll-x-transition mode="in" hide-on-leave="true">
                <router-view></router-view>
            </v-scroll-x-transition>
        </v-container>
    </v-main>    

</template>