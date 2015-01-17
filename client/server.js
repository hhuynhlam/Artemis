'use strict';

var express = require('express');
var path = require('path');

var app = express();

// Set path for static resources
app.use( express.static(path.resolve(__dirname)) );

// Main entry point
app.route('/').get(function(req, res) {
	res.sendFile(path.resolve(__dirname + '/index.html'));
});

// Start server
var server = app.listen( (process.env.PORT || 9000), function () {

  var port = server.address().port;
  console.log('App listening at http://localhost:%s', port);

});
