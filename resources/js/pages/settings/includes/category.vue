<template>
    <v-data-table
      :headers="headers"
      :items="category"
      sort-by="calories"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar
          flat
        >
          <v-toolbar-title>Categories</v-toolbar-title>
          <v-divider
            class="mx-4"
            inset
            vertical
          ></v-divider>
          <v-spacer></v-spacer>
          <v-dialog
            v-model="dialog"
            max-width="300px"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                color="primary"
                dark
                class="mb-2"
                v-bind="attrs"
                v-on="on"
              >
                New Item
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">{{ formTitle }}</span>
              </v-card-title>
  
              <v-card-text>
                <v-container>
                  <v-col>
                    <div>
                      <v-avatar
                        color="orange"
                        size="200"
                      >
                      <v-img
                        style="width: 500px; height: 100%;"
                        :src="editedItem.avatar || logo"
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
                      </v-avatar>
                    </div>
                  </v-col>
                    <v-col
                    >
                      <v-text-field
                        v-model="editedItem.name"
                        label="Category Name"
                      ></v-text-field>
                    </v-col>
                 
                </v-container>
              </v-card-text>
  
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  color="blue darken-1"
                  text
                  @click="close"
                >
                  Cancel
                </v-btn>
                <v-btn
                  color="blue darken-1"
                  text
                  @click="save"
                >
                  Save
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card>
              <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template  v-slot:item.avatar="{ item }">
        <v-avatar size="36px">
            <img
              :alt="item.avatar"
              :src="item.avatar"
            >
          </v-avatar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon
          small
          class="mr-2"
          @click="editItem(item)"
        >
          mdi-pencil
        </v-icon>
        <v-icon
          small
          @click="deleteItem(item)"
        >
          mdi-delete
        </v-icon>
      </template>
      <template v-slot:no-data>
        <v-btn
          color="primary"
        
        >
          Reset
        </v-btn>
      </template>
    </v-data-table>
  </template>

<script>
import logo from '../../../assets/logo.jpg'
import axios from '../../../plugins/axios'
export default {
  data: () => ({
    logo,
    dialog: false,
    dialogDelete: false,
    headers: [
      { text: 'Avatar', value: 'avatar' },
      { text: 'Category', value: 'name' },
      { text: 'Actions', value: 'actions', sortable: false },
    ],
    category: [],
    editedIndex: -1,
    editedItem: {
      name: '',
      avatar: ''
    },
    defaultItem: {
      name: '',
      avatar: '',
    },
  }),

  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
  },

  watch: {
    dialog (val) {
      val || this.close()
    },
    dialogDelete (val) {
      val || this.closeDelete()
    },
  },

  created () {
    // this.initialize()
    this.showCategory()
  },

  methods: {
    onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        this.createImg(files[0]);
      },
      createImg(file){
        var reader = new FileReader; 
        reader.onload = (e) => {
          this.editedItem.avatar = e.target.result;
          };
        reader.readAsDataURL(file)
      },

    editItem (item) {
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem (item) {
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },

    deleteItemConfirm () {
      this.desserts.splice(this.editedIndex, 1)
      this.closeDelete()
    },

    close () {
      this.dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeDelete () {
      this.dialogDelete = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    save () {
      axios.post('add-category', this.editedItem).then((response)=> {
        console.log(response.data);
      })
      // if (this.editedIndex > -1) {
      //   Object.assign(this.desserts[this.editedIndex], this.editedItem)
      // } else {
      //   this.desserts.push(this.editedItem)
      // }
      // this.close()
    },
    showCategory(){
      axios.get('show-category').then((response)=> {
        console.log(response.data)
        this.category = response.data
      })
    }
  },
}
</script>
<style>
.img-holder {
    width: 90%;
    height: 300px;
    border-radius:50px;
    background: #f8f9fb;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left:1em;
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

</style>