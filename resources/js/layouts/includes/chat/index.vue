<template>
     <v-card
        v-model="dialog"
        persistent
        width="25%"
        content-class="my-custom-dialog"
    >
    <v-card>I am dialog</v-card>
    </v-card>
</template>
<script>
export default {
    data() {
        return {
            
        }
    },
    props:  {
        dialog:{
            required: true,
            type: Boolean,
            default: false
        },
    }
}
</script>
<style scoped>
  >>> .my-custom-dialog {
    align-self: right;
  }
</style>