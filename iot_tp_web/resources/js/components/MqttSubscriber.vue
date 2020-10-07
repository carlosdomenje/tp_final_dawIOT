<template>
  <div class="sub" v-html="buff">
  </div>
</template>

<script>
export default {
  data () {
    return {
      buff: 'Sub1:<br>'
    }
  },
  props:[
      'topic'
  ],
  mqtt: {
    /** 'VueMqtt/publish1' or '+/publish1' */
    '#' (data) {
      this.buff = this.buff + data + '<br>'
    }
  },
  mounted () {
    this.$mqtt.subscribe(this.topic)
  }
}
</script>