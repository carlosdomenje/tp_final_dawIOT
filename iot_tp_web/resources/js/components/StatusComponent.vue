<template>
  <div id="app">
    <span style="height: 25px;
  width: 90px;" v-bind:class="status">LED: {{status_led}}</span>
  </div>
  
</template>

<script>

export default {
  data () {
    return {
      status_led: "Apagado",
      status: "badge badge-danger"
    }
  },
  props:[
      'topic',
  ],
  mqtt: {
    /** 'VueMqtt/publish1' or '+/publish1' */
    '#' (data,topic) {
        if (topic.split('/').pop() === 'status'){
            if (data.toString() === 'off'){
                this.status_led = 'Apagado';
                this.status = "badge badge-danger";
            }else{
                this.status_led = 'Encendido';
                this.status = "badge badge-success";
            }
        }
      console.log("data" + data.toString());
    }
  },
  mounted () {
    this.$mqtt.subscribe(this.topic)
  },
  components: {
    
  },
};
</script>