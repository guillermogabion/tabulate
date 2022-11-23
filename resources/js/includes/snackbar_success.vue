<template>
    <v-snackbar
    v-model="snackbar"
    :timeout="timeout"
    >
    Success
    </v-snackbar>
</template>
<script>
  export default {
    data: () => ({
      snackbar: false,
      text: 'My timeout is set to 2000.',
      timeout: 2000,
    }),
  }
</script>