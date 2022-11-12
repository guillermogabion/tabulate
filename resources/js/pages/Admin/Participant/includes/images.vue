<template>
    <div>
        <v-dialog
        v-model="show"
        persistent
        >  
        <v-card>
            <v-card-title>
                Images
                <v-spacer></v-spacer>
                <v-btn icon @click="$emit('close')">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-card-title>
            <v-card-text>
                <v-sheet color="grey lighten-3" 
                rounded="lg" class="pa-2 d-flex flex-wrap justify-center"
                style="max-height: 70vh; overflow:auto;">
                    <input type="file" ref="file_input"
                    accept="image/x-png,image/gif,image/jpeg"
                    @change="onFileChange($event.target.files)"
                    style="display:none;"/>
                    <v-card elevation="0" @click="$refs.file_input.click()" outlined height="100" width="120" class="img-input d-flex mr-2 mb-2 justify-center align-center">
                        <div class="text-center">
                            <v-icon>mdi-upload</v-icon><br>
                            <span class="grey--text">upload new</span>
                        </div>
                    </v-card>
                    <template v-for="(image, i) in images">
                        <div :key="image.id" style="position:relative;" @click="selected = i">
                            <input type="checkbox" :checked="i == selected ? true : false" class="img-cbx"/>
                            <v-card elevation="0" height="100" width="120" class="mr-2 mb-2 av-img">
                                <v-img
                                height="100"
                                width="120"
                                alt="Image"
                                :src="image.url"
                                ></v-img>
                            </v-card>
                        </div>
                    </template>
                </v-sheet>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text @click="$emit('close')">Close</v-btn>
                <!-- <v-btn color="primary" @click="existingImg" :disabled="selected == null ? true : false">Select image</v-btn> -->
            </v-card-actions>
        </v-card>
        </v-dialog>

    </div>
</template>
<script>
export default {
    data() {
        return {
            selected: null,
            images: [
                {
                    selected: false
                }
            ]
        }
    },
    props: {
        show: {
            type: Boolean,
            default: () => false
        },
        image: {
            type: String,
            default: () => ''
        },
    }
}
</script>