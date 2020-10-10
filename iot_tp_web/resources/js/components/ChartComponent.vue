<template>
  <div id="app">
    <GChart
      type="LineChart"
      :data="chartData"
      :options="chartOptions"
       
    />    
  </div>
</template>

<script>
import { GChart } from "vue-google-charts";
export default {
  components: {
    GChart
  },
  
  props:{
    mac: {
      type: String
    }
  },
      
  data() {
    return {
      // Array will be automatically processed with visualization.arrayToDataTable function
      chartData: [],
      chartOptions: {
        resizeDebounce :"500",
        title:"MEDICION REMOTA - HISTORICOS",
        legend:{position: "bottom"},
        width:"800",
        height:"400",
        curveType: "function",
        chart: {
          legend: "left"
        }
      }
    };
  },
  methods: {
      loadData() {
          axios.get('http://127.0.0.1:8000/api/measure/' + this.mac)
                      .then((response)=>{
                        var data = [["Fecha", "Temperatura"]];
                        response.data.forEach(obj => {
                          var date = new Date(obj.timestamp).toLocaleDateString();
                          var fil = [date, parseFloat(obj.value)];
                          data.push(fil);
                        });
                        this.chartData = data;
                      });
      }
  },
  
  mounted() {
      this.loadData();
  }
};
</script>