<template>
    <div>
        <v-image-input
            max-height="300"
             max-width="500"
            v-model="image"
            :image-quality="0.85"
            clearable
            image-format="jpeg"
            @file-info="onFileInfo"
            overlayBackgroundColor="disable"
            overlayBackground="false"
            overlayBorderWidth="0px"
             cover
            />
    </div>
</template>
<script>
import VImageInput from 'vuetify-image-input';
export default {
  components: {
    VImageInput,
  },
  // ...
};
</script>