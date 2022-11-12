<template>

<v-dialog v-model="dialog"   min-width="80%" max-width="80%" scrollable persistent>
      <v-card
      width="30%"
      justify="center"
      >
         <v-card-title class="text-h5 grey lighten-2 mb-4">
            <span>Category</span>
         </v-card-title>
         <!-- VCardText after VCardTitle -->
         <v-card-text>
            <v-row>
                <v-col v-for="item in category" 
                    :key="item.id"
                    cols="8"
                    :lg="8"
                    :sm="8"
                    :md="8"
                    :xs="10"
                >
                <v-card
                class="mx-auto pa-2"
                min-width="290px"
                max-height="150"
                min-height="150"
                @click="redirect(item.id)"
                >

                <v-img
                max-height="100"
                max-width="50"
                :alt="item.avatar"
                :src="item.avatar"
                >

                </v-img>
                    {{item.name}}
                </v-card>
            
                </v-col>
            </v-row>
         </v-card-text>
         <v-card-title class="text-h5 grey lighten-2">
           <v-btn
           color="grey"
           @click="$emit('close')"
           >Close</v-btn>
         </v-card-title>
      </v-card>
   </v-dialog>
</template>
<script>
import axios from '../../plugins/axios'
export default {
    data () {
        return {
         
            payload : {
                id : '',
                title : ''
            },
            category : [],
            
        }
    },
    
    props: {
        dialog:{
            required: true,
            type: Boolean,
            default: false
        },
        id:{
            type: Number,
        }
    },
    watch:{
        id: function(val){
            if(val != 0){
                console.log(val, 'val')
                this.fetchEvent(val)
                this.fetchCategory(val)
            }
        }
    },
    methods : {
        fetchEvent(id){
            axios.get('event/active/' + id).then(response => {
                this.payload.id = response.data.id
                this.payload.title = response.data.title
            })
        },
        fetchCategory(id){
            axios.get('category/active/' + id ).then(response=> {
                this.category = response.data
            })
        },
        redirect(item){
             this.$router.push("/getcriteria/" + item);
          },
    }
    
}
</script>