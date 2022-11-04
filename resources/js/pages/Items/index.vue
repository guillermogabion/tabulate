<template>
    <div>
        <v-col>
           <v-card min-height="1%" max-height="1%">
            <div>
            <v-row
            class="ma-3"
            >
                <v-card-title>
                Items
                </v-card-title>
                <v-divider
                inset
                vertical
                ></v-divider>
                <v-spacer></v-spacer>
                <v-row
                justify="center"
               
                >
                    <v-col
                    class="ma-2"
                    >
                        <v-text-field
                            label="Item Name"
                            placeholder="Item Name"
                            solo
                            class="pa-2 ins"
                        ></v-text-field>
                    </v-col>
                    <v-col
                    class="ma-2"
                    >
                        <v-select
                        class="pa-2 selects ins"
                        height="20%"
                        :items="items"
                       solo
                        label="Category"
                        dense
                        
                        ></v-select>
                    </v-col>
                </v-row>
               
            </v-row>
            </div>
           </v-card>
        </v-col>
        <v-col>
            column 2
        </v-col>
    </div>
</template>
<style>
.selects .v-input__slot {
  padding: 11px !important;
}

</style>