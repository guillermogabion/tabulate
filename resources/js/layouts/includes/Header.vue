<template>
   <v-app-bar app absolute  color="rgb(91, 88, 88)" class="text-white">
      <v-app-bar-nav-icon @click.stop="$emit('changeStatusDrawer')" color="white"></v-app-bar-nav-icon>
      <v-spacer></v-spacer>
      <Profile/>
   </v-app-bar>
   
      
</template>

<script>
import Profile from './Profile.vue'

export default {
   components :{
      Profile
   }
}
</script>