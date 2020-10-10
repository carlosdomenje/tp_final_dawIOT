<template>
  <div id="app">
    
    <VueSvgGauge
    :start-angle="-110"
    :end-angle="110"
    :value="valor"
    :separator-step="10"
    :min="0"
    :max="100"
    :gauge-color="[{ offset: 0, color: '#347AB0'}, { offset: 100, color: '#8CDFAD'}]"
    :scale-interval="5"
    />
    
    <h1 style="text-align:center; font-size:500%">{{valor}} % </h1> 
  </div>
  
</template>

<script>
import { VueSvgGauge } from "vue-svg-gauge";
export default {
  
  data () {
    return {
      valor: 0,
    }
  },
  props:[
      'topic',
  ],
  methods:{
    
  },
  mqtt: {
    '#' (data, topic){
      if (topic.split('/').pop() === 'value'){
        this.valor = parseInt(data),
        console.log(this.valor);
      }
      
    }
    
    
  },
  mounted () {
    this.$mqtt.subscribe(this.topic)
  },
  components: {
    VueSvgGauge
  },
};
</script>