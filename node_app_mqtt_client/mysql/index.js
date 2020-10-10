var mysql = require('mysql2');
var configMysql = {
    connectionLimit: 10,
    host: 'localhost',
    port: 3306,
    user: 'carlos',
    password: 'carlos12@',
    database: 'laravel',
    insecureAuth: true
}
var pool = mysql.createPool(configMysql);
pool.getConnection((err, connection) => {

    if (err) {
        console.error(err);
        switch (err.code) {
            case 'PROTOCOL_CONNECTION_LOST':
                console.error('La conexion a la DB se cerró.');
                break;
            case 'ER_CON_COUNT_ERROR':
                console.error('La base de datos tiene muchas conexiones');
                break;
            case 'ECONNREFUSED':
                console.error('La conexion fue rechazada');
        }
        if (connection) {
            console.error('Conexion exitosa');
            connection.release();

        }
        return;
    }
});
module.exports = pool;