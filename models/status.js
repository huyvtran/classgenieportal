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

/**
 * status model class
 *
 * @param req, res
 */
module.exports = {
	getContent: function (req, res, obj){
		 var query_str = url.parse(req.url,true).query;
		 if(typeof query_str.token_parent != 'undefined'){
         var token = query_str.token_parent; 
		 var parent_token = encryption.decrypt(token); 
		 var parent_arr = parent_token.split("~"); 
		
		 // Parent varified by teacher
		 QUERY = "SELECT * FROM "+req.app.get('config').eduser+" WHERE email='"+parent_arr[0]+"' AND type = '3' AND status > '-1'";
		 req.app.get('connection').query(QUERY, [token], function(err, rows_eduser, fields){
	           if(err){
	              req.app.get('global').fclog("Error Selecting : %s ",err);
	              res.end();
	            }
		
		 if(_.size(rows_eduser) > 0){
			 
		 QUERY = "SELECT * FROM "+req.app.get('config').studentinfo+" WHERE parent_no=?";
		 req.app.get('connection').query(QUERY, [parent_arr[1]], function(err, rows, fields){
	           if(err){
	              req.app.get('global').fclog("Error Selecting : %s ",err);
	              res.end();
	            }
				
	            if(rows[0].parent_ac_no == 0 && rows[0].parent_ac_no != 'undifine'){ 
                         // change messege"plz signin and add parent code" 	            	     
						 var msg = message.signup_parentcode;
					      module.exports.sendMsg(req, res, obj, msg, rows);
                   	 }else{
 	            	// update request_status   	            	 	
	            	 QUERY = "UPDATE "+req.app.get('config').studentinfo+" SET request_status='1' WHERE parent_ac_no=?";	            	 
                     req.app.get('connection').query(QUERY, [parent_arr[1]], function(err, rows1, fields){
			           if(err){
			              req.app.get('global').fclog("Error Updating : %s ",err);
			              res.end();
			             }
			             var msg = message.already_Activated;
			             module.exports.sendMsg(req, res, obj, msg, rows);
			         });
					 
					 QUERY = "UPDATE "+req.app.get('config').eduser+" SET status='1' WHERE email=? AND type = '3'";	            	 
                     req.app.get('connection').query(QUERY, [parent_arr[1]], function(err, rows1, fields){
			           if(err){
			              req.app.get('global').fclog("Error Updating : %s ",err);
			              res.end();
			             }
			          });
			   }
           });
		   }else{
		      var msg = message.signup;
		      module.exports.sendMsg(req, res, obj, msg);
		    }
		   });
		}
        // student is varified by parent
		else if(typeof query_str.token != 'undefined')
            {
		      var token = query_str.token; 
              var token_no = encryption.decrypt(token);
		      var arr = token_no.split("~"); 

		      QUERY = "SELECT * FROM "+req.app.get('config').eduser+" WHERE email='"+arr[0]+"' AND type = '3' AND status > '-1'";
		      req.app.get('connection').query(QUERY, function(err, rows, fields){
	           if(err){
	              req.app.get('global').fclog("Error Selecting1 : %s ",err);
	              res.end();
	            } 
	            if(_.size(rows)>0){
				  var parent_ac_no = rows[0].member_no;
                  QUERY = "SELECT * FROM "+req.app.get('config').studentinfo+" WHERE student_no=?";
                 
  		          req.app.get('connection').query(QUERY, [arr[1]], function(err, rowsinfo, fields){
		           if(err){
		              req.app.get('global').fclog("Error Selecting2 : %s ",err);
		              res.end();
		            }
					if(rowsinfo[0].parent_ac_no==0){
					UPDATE = "UPDATE "+req.app.get('config').studentinfo+" SET parent_ac_no=?, status='1', request_status = '1'  where student_no=?";
					   req.app.get('connection').query(UPDATE, [parent_ac_no,arr[1]], function(err, rows1, fields){
					   if(err){
						  req.app.get('global').fclog("Error Selecting3 : %s ",err);
						return false;
						 }
	                   });
                    UPDATE = "UPDATE "+req.app.get('config').eduser+" SET status='1' where member_no=?";
					   req.app.get('connection').query(UPDATE, [parent_ac_no], function(err, rows1, fields){
					   if(err){
						  req.app.get('global').fclog("Error Selecting : %s ",err);
						  return false;
						 }
	                   }); 
		 
					}
				  QUERY = "SELECT * FROM "+req.app.get('config').eduserstudentinfo+" WHERE student_info_id=?";

		          req.app.get('connection').query(QUERY, [rowsinfo[0].id], function(err, row_eduserstudentinfo, fields){                  
		           if(err){
		              req.app.get('global').fclog("Error Selecting4 : %s ",err);
		              return false;
		            }
                  QUERY = "SELECT * FROM "+req.app.get('config').edparentuser+" WHERE student_ac_no=? and parent_ac_no=?";
                  req.app.get('connection').query(QUERY, [row_eduserstudentinfo[0].student_ac_no, parent_ac_no], function(err, row_edparentuser, fields){ 
				  
		           if(_.size(row_edparentuser) >0){
					UPDATE = "UPDATE "+req.app.get('config').eduser+" SET status='1' where member_no=?";
					req.app.get('connection').query(UPDATE, [row_eduserstudentinfo[0].student_ac_no], function(err, rows1, fields){
					   if(err){
						  req.app.get('global').fclog("Error Selecting : %s ",err);
						  return false;
						 }
	                   });
                     var msg = message.already_Activated;
			         module.exports.sendMsg(req, res, obj, msg, rows);
                   }else{
	               UPDATE = "UPDATE "+req.app.get('config').eduser+" SET status='1' where member_no=?";
					req.app.get('connection').query(UPDATE, [row_eduserstudentinfo[0].student_ac_no], function(err, rows1, fields){
					   if(err){
						  req.app.get('global').fclog("Error Selecting : %s ",err);
						  return false;
						 }
	                   }); 

                  INSERT = "INSERT INTO "+req.app.get('config').edparentuser+" SET parent_ac_no=?, student_ac_no=?, created_at=" +" ' "+_global.js_yyyy_mm_dd_hh_mm_ss()+" ' " +", updated_at="+" ' "+_global.js_yyyy_mm_dd_hh_mm_ss()+" ' ";     		 
                   req.app.get('connection').query(INSERT, [parent_ac_no,row_eduserstudentinfo[0].student_ac_no], function(err, rows, fields){
                     req.app.get('global').fclog("Error Selecting5 : %s ",err);
	                 res.end();
                   });
                  var msg = message.ac_activate_Kids;
			      module.exports.sendMsg(req, res, obj, msg, rows);
			    }                 
                });
		     });
			 });
	            }else{
	              var msg = message.signup;
			      module.exports.sendMsg(req, res, obj, msg, rows);
	            }
	           });
            }else if(typeof query_str.member_no != 'undefined'){
           
			// teacher varified by email link by teacher or Admin 	
             var member_no = query_str.member_no; 
		     var token = encryption.decrypt(member_no); 
             QUERY = "SELECT email, school_id FROM "+req.app.get('config').eduser+" WHERE member_no=? and type = '2' and status='0'";
		      req.app.get('connection').query(QUERY, [token], function(err, rows, fields){
	           if(err){
	              req.app.get('global').fclog("Error Selecting : %s ",err);
	              res.end();
	            }else{
            if(_.size(rows) > 0) {	
            	
             // Update ed_user table	
	          UPDATE = "UPDATE "+req.app.get('config').eduser+" SET status='1' where member_no=?";
	          req.app.get('connection').query(UPDATE, [token], function(err, rows1, fields){
	           if(err){
	              req.app.get('global').fclog("Error Selecting : %s ",err);
	              res.end();
	             }
	            });
	          
	          // update ed_school_techer_request table
	           UPDATE = "UPDATE "+req.app.get('config').edstrequest+" SET status='1' where teacher_ac_no=?";
	           req.app.get('connection').query(UPDATE, [token], function(err, rows1, fields){
	           if(err){
	              req.app.get('global').fclog("Error Selecting : %s ",err);
	              res.end();
	             }
	            }); 
              
               // update ed_classinfo table
               UPDATE = "UPDATE "+req.app.get('config').edclassinfo+" SET school_id=? where teacher_ac_no=?";
	           req.app.get('connection').query(UPDATE, [rows[0].school_id,token], function(err, rows1, fields){
	           if(err){
	              req.app.get('global').fclog("Error Selecting : %s ",err);
	              res.end();
	             }
	           }); 
               
               //call api for send mail by portal 
               module.exports.sendMail(rows[0].email, '2');
	         
               var msg = message.ac_activate;
               module.exports.sendMsg(req, res, obj, msg, rows);
               }else{
               var msg = message.already_Activated;
               module.exports.sendMsg(req, res, obj, msg, rows);
		        }
		      }
          });
         }
	},
   
   sendMsg: function(req, res, obj, msg, rows){
   	       var sess =   req.session;
	      res.render(obj.render_page,{
	           	  'render_page': obj.render_page,
			   	  'title': (_.size(rows)>0 ? "Status" : ""),
			   	  'menu': menu.english,
			   	  'message': msg,
			   	  'meta_keyword': (_.size(rows)>0 ? rows[0].metakey : ""),
		  	      'meta_desc': (_.size(rows)>0 ? rows[0].metadesc : "")
		   	       });
	},

	sendMail: function(email, id){
		var sess =   req.session;
    	request(mailUrl.mail_url+'?email='+email+'&id='+id+'&token=aforetechnical@321!', function (error, response, body) {
			  if (!error && response.statusCode == 200) {
			    console.log(body) // Show the HTML for the Google homepage.
			  }
			})
		
	}
}