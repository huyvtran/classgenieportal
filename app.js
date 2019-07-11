
/**
 * Module dependencies.
 */
process.env.TZ = 'Asia/Kolkata';
var express = require('express');
var http = require('http');
var path = require('path');
var redis   = require("redis");
var session = require('express-session');
var sessionstore = require('sessionstore');


//Include all the common class
var connection = require('./js/common/connection');
var config = require('./assets/json/config');
var _global = require('./js/common/global');

var app = express();

//Set variable
app.set('connection', connection);
app.set('global', _global);
app.set('config', config);

// all environments
//app.set('port', process.env.PORT || 3001);
app.set('port', 3001);
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');
app.use(express.favicon());
app.use(express.logger('dev'));
app.use(express.cookieParser());

app.use(session({
    store: sessionstore.createSessionStore({
        type: 'redis',
        host: config.cache_server,     
        port: config.cache_port,                
        prefix: 'sess'         
    }),
    //cookie  : { maxAge  : new Date(Date.now() + (3600000)) },
    saveUninitialized: false,
    resave: false,
    secret: 'aforetechnical!@3216'
}));

app.use(express.bodyParser());
app.use(express.methodOverride());
app.use(app.router);
app.use(express.static(path.join(__dirname, '')));

// development only
if ('development' == config.env) { 
  app.use(express.errorHandler());
}

//Define all routes
require('./routes').useApp(app);


http.createServer(app).listen(app.get('port'), function(){
  //console.log('Express server listening on port ' + app.get('port'));
});