var config = require('../assets/json/config');
var _ = require('underscore');
var url = require('url');
var message = require('../../assets/json/'+(config.env == 'development' ? 'message' : 'message.min')+'.json');
var menu = require('../../assets/json/'+(config.env == 'development' ? 'language' : 'language.min')+'.json');
var request = require('request');
var moment = require('moment-timezone');
/**
 * Login model class
 *
 * @param req, res
 */
module.exports = {
	remove_teacher: function (req, res){
    var data = {};
			 QUERY = "UPDATE  "+req.app.get('config').eduser+" SET status= '-1' WHERE member_no='"+req.body.teacher_id+"'"; 
                                req.app.get('connection').query(QUERY, function(err, rows, result){
                                    if(err){
                                        if(config.debug){
                                              req.app.get('global').fclog("Error Selecting : %s ",err);
                                              res.json({error_code:1, error_msg:message.technical_error});
                                              return false;
                                            }
                                        }
                                        data.status = 'Success';
                                        res.json(data);

                                    });
	     }   
	 }