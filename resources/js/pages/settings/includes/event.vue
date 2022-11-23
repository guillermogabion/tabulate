<template>
  <div>
      <v-card
      >
      
          <v-data-table
              :headers="headers"
              :items="events"
              class="elevation-1"
              :items-per-page="itemsPerPage"
              :loading="loading"
              :page.sync="page"
              @page-count="pageCount = $event"
              :server-items-length="total_events"
              @pagination="fetchEventsData"
              hide-default-footer
          >
              <template v-slot:top>
              <v-toolbar
                  flat
              >
                  <v-toolbar-title>Events</v-toolbar-title>
                  <v-divider
                  class="mx-4"
                  inset
                  vertical
                  ></v-divider>
                  <v-spacer></v-spacer>
                  <v-text-field
                      label="Search"
                      filled
                      rounded
                      dense
                      class="pt-8"
                      append-icon="mdi-magnify"
                      :items="events"
                      v-model="search"
                  ></v-text-field>
                  <div
                  class="pt-1"
                  >
                      <v-btn
                      color="green"
                      dark
                      class="ma-4"
                      fab
                      @click="add()"
                      >
                        <v-icon 
                        pa-8
                        ma-2
                        size="30"
                      
                        dark>
                            mdi-plus
                          </v-icon>
                        </v-btn>
                            
                      </div>
              </v-toolbar>
              </template>
              
          </v-data-table>
          <div class="text-center pt-2">
            <v-pagination
            v-model="page"
            :total-visible="7"
            :length="pageCount"
            
          ></v-pagination>
          </div>


      </v-card>
      <addEvent
      :dialog="dialog"
      @reload="indexEvents()"
      @close="close()"
      ></addEvent>

  </div>
</template>
<script>
// import Axios from 'axios';
import { EventPagination } from '../../../repositories/event.api';
import addEvent from '../dialogs/event_dialog.vue'
export default {
 data: () => ({
   dialog: false,
   dialogDelete: false,
   headers: [
     { text: 'Title', align: 'start', sortable: false, value: 'title',},
     { text: 'Description', value: 'description' },
     { text: 'Start', value: 'start' },
     { text: 'End', value: 'end' },
     { text: 'Actions', value: 'actions', sortable: false },
   ],
   loading: false,
   events: [],
    search : '',
    pageCount: 0,
    itemsPerPage:null,
    total_events:0,
    page:1,
    current_page:0,
 }),
 components : {
    addEvent
 },

 watch: {
   dialog (val) {
     val || this.close()
   },
   dialogDelete (val) {
     val || this.closeDelete()
   },
   "search": {
      handler(val) {
        this.indexEvents(val)
      },
      deep: true,
    },

 },
 mounted(){
  this.initialize()
 }, 


 methods: {
  initialize(){
    // Axios.get('get').then((response) => {
    //   console.log(response.data)
    //   this.participants = response.data
    // })

  },
  set_data_fromServer(data) {
    this.events = data.data
    this.total_events = data.total
    this.itemsPerPage = data.per_page
    this.pageCount = data.last_page
  },
  fetchEventsData(page){
      this.current_page = page.page
      this.indexEvents()
  },
  indexEvents() {
    this.url = 'events/pagination?page='+this.current_page+ '&keyword=' +this.search
    this.loading = true
    if (this.timer) {
      clearTimeout(this.timer);
      this.timer = null;
    }
    this.timer = setTimeout(() => { 
      EventPagination(this.url).then(({data}) => {
        console.log(this.url,"index")
        this.set_data_fromServer(data)
        this.loading = false
      })
    }, 800);
  },
  add(){
    // this.$router.push('/attendee/add')
    this.dialog = true
  },
  close(){
    this.dialog = false
  }
 

 },
}
</script>

