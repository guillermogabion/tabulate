<template>
    <div>
      
     <v-card
      class="mx-2 my-3 py-3"
      elevation="0"
      >
        <v-row>
          <v-col class="justify">
            
            <div class="img-holder">
                  <v-img
                    style="width: 500px; height: 100%;"
                    :src="payload.image || logo"
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
              <v-card-title>
                Login Access Details
              </v-card-title>
              <v-text-field
                label="Email"
                filled
                class="py-2 field-width"
                ></v-text-field>
              <v-text-field
                label="Password"
                filled
                class="field-width"
                ></v-text-field>
              
          </v-col>
          <v-col>

            <v-card-title>
              Attendee Information
            </v-card-title>
            <v-row>
              <v-col>
                <v-text-field
                label="First Name"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                label="Last Name"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
             
            </v-row>
            <v-row>
              <v-col>
                <v-menu
                  v-model="menu2"
                  :close-on-content-click="false"
                  :nudge-right="40"
                  transition="scale-transition"
                  offset-y
                  min-width="auto"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                      v-model="date"
                      append-icon="mdi-calendar"
                      label="Birth Date"
                      readonly
                      v-bind="attrs"
                      v-on="on"
                      filled
                    ></v-text-field>
                  </template>
                  <v-date-picker
                    placeholder="Gender"
                    v-model="date"
                    @input="menu2 = false"
                  ></v-date-picker>
                </v-menu>
              </v-col>
              <v-col>
                <v-select
                  :items="itemed"
                  filled
                ></v-select>
              </v-col>
            </v-row>
            <v-card-title>
              Contact Details
            </v-card-title>
            <v-row>
              <v-col>
                <v-text-field
                label="Email Address"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                label="Phone Number"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-card-title>
              Address Information
            </v-card-title>
            <v-col>
              <v-text-field
                label="Current Address"
                filled
                class="py-2 field-width"
                ></v-text-field>
              <v-text-field
                label="Home Address"
                filled
                class="py-2 field-width"
                ></v-text-field>
            </v-col>
            <v-row>
              <v-col>
                <v-text-field
                label="City"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                label="State"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                label="Zipcode"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                label="Country"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
            color="success"
            >Save</v-btn>
            <v-btn
            color="error"
            >Cancel</v-btn>
          </v-card-actions>
      </v-card>

        
       
    </div>
</template>
<script>
import logo from '../../../../assets/download.png'
  export default {
    data (){
      return {
       
        payload : {
          image : ''
        },
       
        logo,
       
      }
    },

    methods: {
     
      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        this.createImg(files[0]);
      },
      createImg(file){
        var reader = new FileReader; 
        reader.onload = (e) => {
          this.payload.image = e.target.result;
          };
        reader.readAsDataURL(file)
      },
    },
  }
</script>
<!-- <script>
import Images from './images.vue'
import logo from '../../../../assets/download.png'

export default {
  components: {
    Images,
   
  },
  data() {
    return {
      payload : {
        image : ''
      },
      logo,
      ImagesDialog: false,
      menu2: false,
      date: '',
      images: [
        {
            selected: false
        }
      ],
      itemed : [
        'Male',
        'Female'
      ]
    }
  },
  methods: {
    have(){
      this.ImagesDialog = true
    },
    onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        this.createImg(files[0]);
      },
      createImg(file){
        var reader = new FileReader; 
        reader.onload = (e) => {
          this.payload.image = e.target.result;
          };
        reader.readAsDataURL(file)
      },
  }
  // ...
};
</script> -->
<style scoped>
.text-field-spaces {
  padding: 5%;
}
.img-holder {
    width: 70%;
    height: 455px;
    border-radius: 5px;
    border: 3px dashed #dadbdd;
    background: #f8f9fb;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 8em;
}
.field-width {
  width: 100%;
}
.justify {
  justify-content: center;
}

.inputWrapper {
    overflow: hidden;
    position: relative;
    cursor: pointer;
    /*Using a background color, but you can use a background image to represent a button*/
    background-color: #DDF;
}

.fileInput {
    cursor: pointer;
    height: 100%;
    position:absolute;
    top: 0;
    right: 0;
    /*This makes the button huge so that it can be clicked on*/
    font-size:50px;
}
.hidden {
    /*Opacity settings for all browsers*/
    opacity: 0;
    -moz-opacity: 0;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0)
}


/*Dynamic styles*/
.inputWrapper:hover {
    background-color: #FDD;
}
.inputWrapper.clicked {
    background-color: #A66;
}

.v-select--active {
  background-color: whitesmoke !important;
}
.title-text {
  font-family: Georgia, 'Times New Roman', Times, serif;
  font-size: medium;
  font-weight: bold;
  padding-top: 5%;
}
/* .custom-file-input::-webkit-file-upload-button {
  height: 100%;
} */


</style>