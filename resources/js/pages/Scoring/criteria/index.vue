<template>
    <div>
        <v-card
        justify="center"
        scrollable
        >
        <v-card-title class="text-h5 grey lighten-2 mb-4">
            <span>{{this.category.name}}</span>
         </v-card-title>
           <v-row>
          
            <v-col>
            <template>
                <div
                v-for="item in criteria"
                :key="item.id"
                class="spaces"
                >
                    <v-card
                    class="pa-1"
                    min-width="100px"
                    max-height="300"
                    min-height="150"
                    >
                    <v-card-title class="text-h5 grey lighten-2 mb-2">
                        {{item.title}}
                    </v-card-title>
                    <v-card-text>
                        {{item.description}}
                    </v-card-text>
                    <v-card-title class="text-h6">
                        Maximum Points : <v-chip>{{item.point}}</v-chip>   
                    </v-card-title>
                    <!-- <v-text-field
                    :value="item.value"
                    v-model="item.state"
                    type="number"
                  
                    > -->
                    <!-- </v-text-field> -->
                    <v-col cols="12">
                        <v-slider
                        thumb-label
                        v-model="item.state"
                        :max="item.point"
                        :min="1"
                        label="Rate"
                        class="align-center"
                        thumb-color="warning"
                        >
                        <template v-slot:append>
                            <v-text-field
                            :value="item.value"
                            v-model="item.state"
                            class="mt-0 pt-0"
                            type="number"
                            style="width: 60px"
                            readonly
                            ></v-text-field>
                        </template>
                        </v-slider>
                    </v-col>
                    </v-card>
                </div>
            </template>
            </v-col>
           </v-row>
           <v-card-title class="text-h5 grey lighten-2 mb-4">
            <v-spacer></v-spacer>
            <v-card-actions
            >
               
                <v-btn @click=" dialog = true">Finalize</v-btn>
            </v-card-actions>
            <v-spacer></v-spacer>
           </v-card-title>
        </v-card>
        <v-dialog
        v-model="dialog"
        >
            <v-card>
                <v-col>
                    <v-data-table
                        :headers="headers"
                        :items="criteria"
                        :items-per-page="5"
                        class="elevation-1"
                        hide-default-footer
                        hide-default-header
                        :mobile-breakpoint="0"
                    ></v-data-table>
                </v-col>
                <v-col>
                    <v-card-title>
                        Total Rating : {{totalScore }}
                    </v-card-title>
                </v-col>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="success">Submit</v-btn>
                    <v-btn color="warning">Back</v-btn>
                </v-card-actions>
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
                category : [],
                dialog: false,
                data : '',
                headers : [
                    {text : "Criteria", value: "title"},
                    {text : "Available Point", value: "point"},
                    {text : "Given Point", value: "state"},
                ],
                Score: [
                    v => !!v || "Please fill all field",
                    v => ( v && v >= (item.point)) || "Should not more than the limit",
                    v => ( v && v <= 0) || "Should not less than 1"
                ]
            }
        },
        mounted(){
            this.fetchCriteria()
            this.fetchCategory()
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
            fetchCategory(){
                axios.get('display-category/' + this.$route.params.id).then(response => {
                    this.category = response.data
                    console.log(response.data)
                }); 
            }
        }
    }
</script>
<style scoped>
.spaces {
    padding: 2em;
}
</style>