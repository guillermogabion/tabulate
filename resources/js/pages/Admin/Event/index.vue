<template>
  <div>
      <v-col>
         <v-card min-height="1%" max-height="1%">
          <div>
          <v-row
          class="ma-3"
          >
              <v-card-title>
              Events
              </v-card-title>
              <v-spacer></v-spacer>
              <v-row
              justify="center"
             
              >
                <v-text-field
                    auto-select-first
                    :items="events"
                    solo
                    clearable
                    ref="sfield"
                    v-model="form.search"
                    dense 
                    single-line 
                    append-icon="mdi-magnify" 
                    class="mx-4 mt-5"
                ></v-text-field>
                 
              </v-row>
             
          </v-row>
          </div>
         </v-card>
      </v-col>
      <v-col>
         <v-row class="ma-1">
          <v-col v-for="item in events" :key="item.id"
              cols="12" :lg="2" :sm="8" :md="2" :xs="10" 
          >
         
          <v-card
          class="mx-auto image-contain"
          max-width="280"
          max-height="310"
          min-height="340"
          @click="redirect(item.id)"
          >
          <v-img
                contain
                :alt="item.avatar"
                :src="item.avatar"
                max-height="150"
                max-width="200"
              ></v-img>
          <v-card-title class="justify-center">
            {{item.title}}
          </v-card-title>
            {{item.description}}<br>
            Date : {{item.start}}
       

         
          </v-card>

          </v-col>

         </v-row>
      </v-col>
      <eventDialog
      :dialog="dialog"
      :id = "selected_item_id"
      @close="categoryClose()"
      @open="criteriaOpen(selected_item_id)"
      ></eventDialog>
  </div>
</template>
<script>
import axios from '../../../plugins/axios';
import eventDialog from '../../Scoring/index.vue'
import criteriaDialog from '../../Scoring/criteria/index.vue'

  export default {
      components : {
        eventDialog,
       criteriaDialog

      },
      data() {
          return {
              selected_item_id:0,
              events: [],
              form : {
                  search: '',
              },
              dialog : false,
              dialogCriteria: false
          }
      },
      mounted (){
          this.searchEvent()
      },
      methods: {
          searchEvent(key) {
              this.loading = true
              if (this.timer) {
              clearTimeout(this.timer);
              this.timer = null;
              }
              this.timer = setTimeout(() => {
              axios.post('events/search', {searchkey:key}).then((response) => {
                  this.events = response.data.data 
                  this.loading = false
              }).catch((errors) => {
                  console.log(errors)
              });
              },800);
          },
          redirect(id){
            this.selected_item_id = id
            this.$nextTick(() => {
              this.dialog = true
            })
          },
          categoryClose(){
            this.dialog = false
          },
          criteriaOpen(selected_item_id){
            this.selected_item_id = selected_item_id
            this.dialogCriteria = true
            this.categoryClose()
          }
      },
      watch: {
          "form.search": {
              handler(val) {
              this.searchEvent(val)
              },
              deep: true,
          },
      }
  }
 
</script>
<style>
.selects .v-input__slot {
padding: 11px !important;
}
.image-contain {
  padding-top: 1.5em;
  padding-left: 10%;
}

</style>