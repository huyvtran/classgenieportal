var config = require('../assets/json/config');
var menu = require('../../assets/json/'+(config.env == 'development' ? 'language' : 'language.min')+'.json');
var _ = require('underscore');
var redis = require("redis");
var md5 = require("js-md5");
var serialize = require("node-serialize");
var url = require('url');
/**
 * Content model class
 *
 * @param req, res
 */
module.exports = {
	getContent: function (req, res, obj){
         client = redis.createClient(req.app.get('config').cache_port, req.app.get('config').cache_server);
         client.auth(req.app.get('config').cache_password);
		 if(req.app.get('config').cache){
		 	  Key = 'CONTENT_'+md5("SELECT * FROM "+req.app.get('config').content+" WHERE id="+obj.id);
              client.get(Key, function(err, data) {
                  if(err || data === null) {
                  	   QUERY = "SELECT * FROM "+req.app.get('config').content+" WHERE id=?";
                 	   req.app.get('connection').query(QUERY, [obj.id], function(err, rows, fields){
                             if(err){
				                  req.app.get('global').fclog("Error Selecting1 : %s ",err);
				                  res.end();
				               }
		                       client.set(Key, serialize.serialize(rows));	     
		                       module.exports.renderHtml(req, res, obj, rows);
                 	    });
	                 }
	                else
	                { 
	                	rowdata = serialize.unserialize(data);
	                	module.exports.renderHtml(req, res, obj, rowdata);
	                }
              });
		 }
		 else
		 { 
			 QUERY = "SELECT * FROM "+req.app.get('config').content+" WHERE id="+ obj.id+"" ;
			 req.app.get('connection').query(QUERY, function(err, rows, fields){
		           if(err){
		              req.app.get('global').fclog("Error Selecting2 : %s ",err);
		              res.end();
		            }
		            module.exports.renderHtml(req, res, obj, rows);
	         });
        }
	},
	
	renderHtml: function(req, res, obj, rows){
		 if(obj.render_page == "blog"){
		 	QUERY = "SELECT * FROM "+req.app.get('config').blogs+" order by id desc";
		         req.app.get('connection').query(QUERY,  function(err, rows1, fields){
		          if(err){
		             req.app.get('global').fclog("Error Selecting3 : %s ",err);
		             res.end();
		          }
		          obj.blogcontent = rows1;
		          module.exports.renderData(req, res, obj, rows);
		     });

		 }
		 else
		 {
            module.exports.renderData(req, res, obj, rows);
		 }
	 },
	 renderData: function(req, res, obj, rows){
	 	var sess =   req.session;
	         res.render(obj.render_page,{
	       	  'render_page': obj.render_page,
		   	  'menu':menu.english,
		   	  'session':sess.user_list,
	   	      'title': (_.size(rows)>0 ? rows[0].title : ""),
	  	      'content': (_.size(rows)>0 ? rows[0].description : ""),
	  	      'meta_keyword': (_.size(rows)>0 ? rows[0].metakey : ""),
	  	      'meta_desc': (_.size(rows)>0 ? rows[0].metadesc : ""),
	  	      'blogcontent':(typeof obj.blogcontent != 'undefined' ? obj.blogcontent : '')
	     });
	 },
	 closeConnection: function(client){
        client.quit();
	 },

	 removeCache: function(req, res){
		    var query_str = url.parse(req.url,true).query;
			if(typeof query_str.type == 'undefined' || query_str.type == '' || query_str.type == 0){
			    res.end('<center><b><br><br><br><br>Invalid type, Please provide valid type!!!</b></center>');
			    return false;
			}
			if(query_str.type == 1){
			   var criteria = "CONTENT_*";
			}
			if(query_str.type == 2){
			   var criteria = "EMAIL_*";
			}
			if(query_str.type == 3){
			   var criteria = "CLASSIMG_*";
			}
			if(query_str.type == 4){
			   var criteria = "SKILLIMG_*";
			}
			client = redis.createClient(req.app.get('config').cache_port, req.app.get('config').cache_server);
			client.auth(req.app.get('config').cache_password);
			client.keys(criteria, function (err, keys) {
				keys.forEach(function (key, pos) {
					 client.del(key, function(err,o){});
				});
			});
			res.end('<center><b><br><br><br><br>Cache clear successfully!</b></center>');
	 }
}