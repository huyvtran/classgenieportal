var config = require('../assets/json/config');
var _ = require('underscore');
var url = require('url');
var message = require('../../assets/json/'+(config.env == 'development' ? 'message' : 'message.min')+'.json');
var menu = require('../../assets/json/'+(config.env == 'development' ? 'language' : 'language.min')+'.json');
var request = require('request');
var fs = require('fs');


/**
 * Login model class
 *
 * @param req, res
 */
module.exports = {
	edit_profile: function (req, res){
		var input = JSON.parse(JSON.stringify(req.files.upload)); 
                
		  	     request.post({url:config.api_url+'teacher/update'+'?name='+req.body.teacher_name+'&member_no='+req.body.member_no+'&imagee='+req.body.upload_image+'&token=aforetechnical@321!'},  function (error, response, body) {
			   var data = JSON.parse(body);
			  
			   var sess;			 
			   if(data.status == "Failure"){
                  res.json({'status':data.status});
			    }else if(data.status == "Success"){
                  sess = req.session; 
			      sess.user_list = data.user_list;
			      res.json({'status':data.status});
			    }
	    });
  
	         }
	     }