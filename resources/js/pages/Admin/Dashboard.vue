<template>
<v-slide-x-transition>
    
    <v-card>
        <v-row
        class="ma-2"
        >
            <v-col>
                <v-card>
                    1
                </v-card>
            </v-col>
            <v-col>
                <v-card>
                    2
                </v-card>
            </v-col>
            <v-col>
                <v-card>
                    3
                </v-card>
            </v-col>
        </v-row>
        <v-row
        class="ma-2"
        >
            <v-col>
                <v-card class="bar-spacing">
                    <apexchart type="pie"  width="500" height="364" :options="chartOptionsPie" :series="seriesPie"></apexchart>
            </v-card>
        </v-col>
        <v-col>
            <v-card class="bar-spacing">
                <apexchart type="bar" width="500" height="350" :options="chartOptionsBar" :series="seriesBar"></apexchart>
            </v-card>
        </v-col>
        </v-row>
        <v-row
        class="ma-2"
        >
            <v-col>
                <v-card class="bar-spacing">
                <apexchart type="polarArea" width="500" :options="chartOptions" :series="series"></apexchart>
            </v-card>
        </v-col>
        <v-col>
            <v-card class="bar-spacing">
                <apexchart type="bar" width="500" height="350" :options="chartOptionsBar" :series="seriesBar"></apexchart>
            </v-card>
        </v-col>
        </v-row>
        
    </v-card>
</v-slide-x-transition>
</template>

<script>
export default {
    data() {
        return {
            series: [14, 23, 21, 17, 15, 10, 12, 17, 21],
          chartOptions: {
            chart: {
              type: 'polarArea',
            },
            stroke: {
              colors: ['#fff']
            },
            fill: {
              opacity: 0.8
            },
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
          seriesBar: [{
            name: 'Net Profit',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
          }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
          }, {
            name: 'Free Cash Flow',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
          }],
          chartOptionsBar: {
            chart: {
              type: 'bar',
              height: 350
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
              },
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
            },
            xaxis: {
              categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
              title: {
                text: '$ (thousands)'
              }
            },
            fill: {
              opacity: 1
            },
            tooltip: {
              y: {
                formatter: function (val) {
                  return "$ " + val + " thousands"
                }
              }
            }
          },
          seriesPie: [44, 55, 13, 43, 22],
          chartOptionsPie: {
            chart: {
              width: 380,
              type: 'pie',
            },
            labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
          
          
            
        }
    },
   
}
</script>
<style>
.bar-spacing {
    padding-left: 9em;
}
</style>