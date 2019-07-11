var config = require('../assets/json/config');
var _ = require('underscore');
var url = require('url');
var message = require('../../assets/json/' + (config.env == 'development' ? 'message' : 'message.min') + '.json');
var menu = require('../../assets/json/' + (config.env == 'development' ? 'language' : 'language.min') + '.json');
var request = require('request');
var moment = require('moment-timezone');
/**
 * Login model class
 *
 * @param req, res
 */
module.exports = { 
    countries: function (req, res, obj) {
            var inputData = req.body; 
            //console.log(inputData); 
            var data = {};
            QUERY = "SELECT * FROM " + req.app.get('config').countries +" where country_name like '%"+inputData.countryId+"%'";            
            ///console.log(QUERY);
            req.app.get('connection').query(QUERY, function (err, countries, fields) {
                if (err) {
                    req.app.get('global').fclog("Error Selecting : %s ", err);
                    res.end();
                }else{
                     data.status = 'Success';
                     data.countries = countries;
                     res.json(data);
                }
                 
            });
        
    },

    
}   
 
	   
 
