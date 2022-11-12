<template>
    <div>
        <v-card>
           <v-row>
            <v-col
            v-for="item in criteria"
            :key="item.id"
            cols="8"
            :lg="8"
            :sm="8"
            :md="8"
            :xs="10"
            >
            <v-card>
            {{item.title}}
            {{item.description}}
            {{item.point}}
            <v-text-field
            :value="item.value"
            v-model="item.state"
            >
                
            </v-text-field>
            </v-card>

            </v-col>
           </v-row>
           <v-btn @click="click()">cc</v-btn>

           <v-text-field
                v-model="add"
               :value="sumField('value')"
           >

           </v-text-field>
            {{ this.item.value++}}
        </v-card>
    </div>
</template>
<script>
import axios from '../../../plugins/axios'
    export default {
        data() {
            return {
                criteria : [],
                field: '',
                sumup:'',
                add: ''
            }
        },
        mounted(){
            this.fetchCriteria()
        },
        methods: {
            fetchCriteria(){
                axios.get('fetch-criteria/active/' + this.$route.params.id).then(response => {
                    this.criteria = response.data
                });
            },

            click(){
                this.criteria.reduce((a, b) => a + (b[key] || 0), 0)
                this.sumup = sumField('value')
            },

             sumField(key) {
                // sum data in give key (property)
                return this.criteria.reduce((a, b) => a + (b[key] || 0), 0)
            } 
            
           
           
        },
        watch : {
            // sumField(key) {
            //     // sum data in give key (property)
            //     return this.criteria.reduce((a, b) => a + (b[key] || 0), 0)
            // } 
          
         
        },
        
    }
</script>