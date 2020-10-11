<template>
  <div class="publish">
    <button type="button" class="btn btn-success" @click="on_led">ON LED</button>
    <button type="button" class="btn btn-danger" @click="off_led">OFF LED</button>
  </div>

</template>

<script>
export default {
  props:[
      'topic',
  ],
  methods: {
    on_led () {
      this.$mqtt.publish(this.topic, 'on')
    },
    off_led () {
      this.$mqtt.publish(this.topic, 'off')
    }
  },
  mqtt: {
    '/led' (data, topic) {
      console.log(topic + ': ' + String.fromCharCode.apply(null, data))
    },
    '/led' (data, topic) {
      console.log(topic + ': ' + String.fromCharCode.apply(null, data))
    }
  }
}
</script>
