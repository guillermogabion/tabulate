<template>
    <v-dialog
    v-model="dialog"
    min-width="370px" max-width="600px"
    min-height="150%"
    persistent>
        <v-card
        max-width="600px"
        min-width="370px"
        min-height="150%"
        justify="center"
        >
        <v-card-title class="text-h5 grey lighten-2 mb-4">
            <span>Add Event</span>
         </v-card-title>
         <v-col>
            <div class="img-holder">
                <v-img
                style="width: 500px; height: 100%;"
                :src="payload.photo || logo"
                >
                <div class="upload-options" required style="padding-top: 5px;">
                    <input
                        accept="image/png, image/gif, image/jpeg"
                        id="fileData"
                        type="file"
                        @change="onFileChange"
                        style="padding-left: 20%;"
                        class="fileInput hidden"
                    />
                </div>
                </v-img>
            </div>
         </v-col>
         <v-col>
            <v-text-field
            v-model="payload.title"
            label="Title"
            filled
            ></v-text-field>
         </v-col>
         <v-col>
            <v-text-field
            v-model="payload.description"
            label="Description/Subtitle"
            filled
            ></v-text-field>
         </v-col>
         <v-col>
            <v-text-field
            v-model="payload.start"
            label="Start"
            filled
            ></v-text-field>
         </v-col>
         <v-col>
            <v-text-field
            v-model="payload.end"
            label="End"
            filled
            ></v-text-field>
         </v-col>
         <v-card-actions>
            <v-btn
            color="success"
            @click="addEvent()"
            >
             Add Event
            </v-btn>
            <v-btn
            color="warning"
            @click="$emit('close')"
            >
            Close
            </v-btn>
         </v-card-actions>
        </v-card>
        <v-snackbar
        v-model="snackbar"
        :timeout="timeout"
        >
        Success
        </v-snackbar>
    </v-dialog>        
</template>
<script>
import logo from '../../../assets/logocard.png'
import { AddEvent } from '../../../repositories/event.api';
export default {
    data() {
        return {
            snackbar: false,
            timeout: 2000,
            payload : {
                photo : '',
                title: '',
                start : '',
                end : '',
            },
            logo
        }
    },
    props:  {
        dialog:{
            required: true,
            type: Boolean,
            default: false
        },
    },
    methods : {
        onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        this.createImg(files[0]);
      },
      createImg(file){
        var reader = new FileReader; 
        reader.onload = (e) => {
          this.payload.photo = e.target.result;
          };
        reader.readAsDataURL(file)
      },
      addEvent() {
        AddEvent(this.payload).then((response) => {
            console.log(response.data)
            this.snackbar = true
            this.$emit('reload')
            this.$emit('close')
        })
      }
    }
}
</script>