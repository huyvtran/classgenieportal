var config = require('../assets/json/config');
var _ = require('underscore');
var url = require('url');
var encryption = require('../js/common/encryption');
var message = require('../../assets/json/'+(config.env == 'development' ? 'message' : 'message.min')+'.json');
var menu = require('../../assets/json/'+(config.env == 'development' ? 'language' : 'language.min')+'.json');
var _global = require('../assets/common/global');
var http = require('http');
var request = require('request');
var mailUrl = require('../assets/json/config');
var md5 = require('../node_modules/js-md5'); 

/**
 * forgot password model class
 *
 * @param req, res
 */
module.exports = {
	getContent: function (req, res, obj){
	      var query_str = url.parse(req.url,true).query;
		  if(typeof query_str.token != 'undefined'){
             var token = query_str.token; 
		     var email_id = encryption.decrypt(token); 
		  }
		  else
		  {
		    email_id = "";
		  }
	      QUERY = "SELECT * FROM "+req.app.get('config').content+" WHERE id=?";
	         req.app.get('connection').query(QUERY, [obj.id], function(err, rows, fields){
		           if(err){
		              req.app.get('global').fclog("Error Selecting : %s ",err);
		              res.end();
		            }
		          
		           res.render(obj.render_page,{
					  'render_page': obj.render_page,
					  'menu':menu.english,
					  'title': (_.size(rows)>0 ? rows[0].title : ""),
					  'content': (_.size(rows)>0 ? rows[0].description : ""),
					  'meta_keyword': (_.size(rows)>0 ? rows[0].metakey : ""),
					  'meta_desc': (_.size(rows)>0 ? rows[0].metadesc : ""),
					  'email_id':email_id
				 });
	         });
	},
	postForgotPassword: function(req, res){
	    var input = JSON.parse(JSON.stringify(req.body));
	    QUERY = "UPDATE "+req.app.get('config').eduser+" SET password=? WHERE email=?";
		 req.app.get('connection').query(QUERY, [md5(input.password), input.email_id], function(err, rows, fields){
			   if(err){
				  req.app.get('global').fclog("Error Selecting : %s ",err);
				  res.end();
				}
				res.json({'email_id':input.email_id, success_msg:'Password update successfully', 'mail_url':mailUrl.mail_url});
	    });
	}
}