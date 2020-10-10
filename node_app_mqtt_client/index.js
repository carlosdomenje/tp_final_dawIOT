var mqtt = require('mqtt');
var pool = require('./mysql');


var client = mqtt.connect('mqtt://127.0.0.1');

client.on('connect', function() {
    client.subscribe('#', function(err) {
        if (!err) {
            console.log('Cliente conectado');
        }
    });
});

client.on('message', function(topic, message) {
    // message is Buffer
    var topic_mac = topic.split('/')[0];
    var topic_value = topic.split('/')[1];
    var value = message;
    if (topic_value === 'value') {
        fecha = new Date();
        console.log(fecha);
        pool.query('INSERT INTO measures (device_id,mac,value,timestamp) values (?,?,?,?)', [topic_mac, topic_mac, value, fecha], function(err, result, fields) {
            if (err) {
                console.log('datos NO enviados');
                return;
            }
            console.log('datos enviados');
        });
        console.log(topic_mac);
    }

    console.log('mensaje mqtt = ' + message.toString());
    //client.end();
});