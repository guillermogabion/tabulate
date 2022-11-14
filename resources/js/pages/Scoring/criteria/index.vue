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
           <td> {{ totalScore }}</td>
           <v-btn @click=" dialog = true">cc</v-btn>

           <v-text-field
                id="totalordercost"
                v-model="totalScore"
                readonly
                type="number"
           >
           </v-text-field
          
           >
           
        </v-card>
        <v-dialog
        v-model="dialog"
        >
            <v-card>
                <v-data-table
                    :headers="headers"
                    :items="criteria"
                    :items-per-page="5"
                    class="elevation-1"
                ></v-data-table>

                
               <!-- <table>
                <tr>
                    <td>Criteria</td>
                    <td>Available point</td>
                    <td>Given Point</td>
                </tr>
                <tr v-for="crit in criteria" :key="crit.id">
                    <td>
                        <input type="text" v-bind:data-id="crit.title" v-model="crit.title">
                        <input type="text" v-bind:data-id="crit.point" v-model="crit.point">
                        <input type="text" v-bind:data-id="crit.state" v-model="crit.state">
                    </td>
                </tr>
                <tr>
                    <td>
                        Total
                    </td>
                    <td> {{ totalScore }}</td>
                </tr>
               </table> -->

            </v-card>
        </v-dialog>
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
                add: '',
                total : '',
                dialog: false,
                data : '',
                headers : [
                    {text : "Criteria", value: "title"},
                    {text : "Available Point", value: "point"},
                    {text : "Given Point", value: "state"},
                ]
            }
        },
        mounted(){
            this.fetchCriteria()
        },
        computed : {
            totalScore(){
                console.log('total score')
                return this.criteria.reduce((acc, cur) => acc + Number(cur.state), 0);
            }
        },
       
        methods: {
            fetchCriteria(){
                axios.get('fetch-criteria/active/' + this.$route.params.id).then(response => {
                    this.criteria = response.data
                });
            },
           
        }
    }

         
            
           
           
       
        
</script>