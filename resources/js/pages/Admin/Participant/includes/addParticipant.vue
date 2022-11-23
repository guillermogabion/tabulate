<template>
    <div>
    <v-card
    
    >
     <v-card
      class="mx-2 my-3 py-3 content"
      elevation="0"
      >
      <v-form
      ref="form"
      v-model="valid"
      >

        <v-row>
          <v-col
          >
            
          <div class="img-holder">
                  <v-img
                    style="width: 500px; height: 100%;"
                    :src="payload.avatar || logo"
                  >
                  <div class="upload-options" required style="padding-top: 5px;">
                    <input
                      accept="image/png, image/gif, image/jpeg"
                      id="fileData"
                      type="file"
                      @change="onFileChange"
                      style="padding-left: 20%;"
                      class="fileInput hidden"
                      :rules="[v => !!v || 'Image is required']"
                    />
      
                  </div>
                  </v-img>
              </div>
              <v-card-title>
              Participant Information
              </v-card-title>
              <v-text-field
                v-model="payload.firstname"
                label="First Name"
                filled
                class="py-2 field-width"
                :rules="firstnameRules"
                ></v-text-field>
                <v-text-field
                v-model="payload.lastname"
                label="Last Name"
                filled
                class="py-2 field-width"
                :rules="lastnameRules"
                ></v-text-field>
                <v-row>
                <v-col>
                    <v-menu
                   
                    :close-on-content-click="false"
                    :nudge-right="40"
                    transition="scale-transition"
                    offset-y
                    min-width="auto"
                    >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                        v-model="payload.birthdate"
                        append-icon="mdi-calendar"
                        label="Birth Date"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        filled
                        :rules="[v => !!v || 'Date is required']"
                        ></v-text-field>
                    </template>
                    <v-date-picker
                        placeholder="Date"
                        v-model="payload.birthdate"
                    ></v-date-picker>
                    </v-menu>
                </v-col>
                <v-col>
                    <v-select
                    :items="items"
                    filled
                    :rules="[v => !!v || 'Gender is required']"
                    v-model="payload.gender"
                    ></v-select>
                </v-col>
                </v-row>
          </v-col>
          <v-col
          >
            <v-card-title class="justify-center">
              Contact Details
            </v-card-title>
            <v-row>
              <v-col >
                <v-text-field
                v-model="payload.email"
                type="email"
                label="Email Address"
                filled
                class="py-2 field-width"
                :rules="emailRules"
                ></v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                v-model="payload.number"
                type="number"
                label="Phone Number"
                filled
                class="py-2 field-width"
                :rules="[v => !!v || 'Contact is required']"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-card-title class="justify-center">
              Address Information
            </v-card-title>
            <v-col>
              <v-text-field
                v-model="payload.address"
                label="Current Address"
                filled
                full-width
                class="py-2 field-width"
                :rules="[v => !!v || 'Address is required']"
                ></v-text-field>
              <v-text-field
                v-model="payload.home"
                label="Home Address"
                filled
                class="py-2 field-width"
                :rules="[v => !!v || 'Address is required']"
                ></v-text-field>
            </v-col>
            <v-row>
              <v-col>
                <v-text-field
                v-model="payload.city"
                label="City"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                v-model="payload.state"
                label="State"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-text-field
                v-model="payload.zipcode"
                label="Zipcode"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                v-model="payload.country"
                label="Country"
                filled
                class="py-2 field-width"
                ></v-text-field>
              </v-col>
             
             
            </v-row>
            <v-row>
                <v-col>
                <v-text-field
                v-model="payload.contest_number"
                label="Participant Number"
                filled
                class="py-4 field-width"
                :rules="[v => !!v || 'Contestant Number is required']"
                >
                
                </v-text-field>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-form>

        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
            color="success"
            @click="create()"
            >Save</v-btn>
            <v-btn
            color="error"
            >Cancel</v-btn>
          </v-card-actions>
      </v-card>
     

    </v-card> 
    <v-snackbar
        v-model="snackbar"
        :timeout="timeout"
        >
        Success
        </v-snackbar>
    </div>
</template>
<script>
import { AddParticipants } from '../../../../repositories/participant.api'
import logo from '../../../../assets/download.png'
  export default {
    data (){
      return {
        snackbar: false,
      timeout: 2000,
        payload : {
            image: '',
            avatar: '',
          firstname : '',
          lastname : '',
          gender : '',
          birthdate : '',
          email : '', 
          number : '',
          address : '',
          home : '',
          city : '',
          state : '',
          zipcode : '',
          country : '',
          contest_number : '',
        },
        valid: true,
        logo,
        firstnameRules: [
            v => !!v || 'First Name is required',
            v => (v && v.length <= 20) || 'First Name must be less than 20 characters',
        ],
        lastnameRules: [
            v => !!v || 'Last Name is required',
            v => (v && v.length <= 20) || 'Last Name must be less than 20 characters',
        ],
        emailRules: [
            v => !!v || 'E-mail is required',
            v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        items :[
            "Male",
            "Female"
        ],
        snackbar: false
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
          this.payload.avatar = e.target.result;
          };
        reader.readAsDataURL(file)
      },
      create(){
        if(!this.$refs.form.validate()) return;
        AddParticipants(this.payload).then((response)=> {
            console.log(response)
            this.payload = ''
            this.snackbar = true
        })
      }
    },
  }
</script>

<style scoped>
.text-field-spaces {
  padding: 5%;
}
.img-holder {
    min-width: 10%;
    max-width: 500px;
    height: 455px;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
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
.content {

}


</style>