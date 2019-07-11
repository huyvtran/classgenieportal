var config = require('../assets/json/config');
var _ = require('underscore');
var url = require('url');
var message = require('../../assets/json/'+(config.env == 'development' ? 'message' : 'message.min')+'.json');
var menu = require('../../assets/json/'+(config.env == 'development' ? 'language' : 'language.min')+'.json');
var request = require('request');
/**
 * Login model class
 *
 * @param req, res
 */
module.exports = {
	getContent: function (req, res, obj){
			        var sess =   req.session;
			       
			    res.render(obj.render_page,{
					  'render_page': obj.render_page,
					  'menu':menu.english,
					  'title': (""),
					  'meta_keyword':  (''),
		  	          'meta_desc': (''),
		  	          'config':config,
		  	          'session':sess.user_list
		  	      });
	         },

	postSignup: function(req, res){
              var inputdata = req.body;
              module.exports.insertSignup(req, res,inputdata);
           	 },
    insertSignup: function(req, res,input){
    	   
    	request.post(config.api_url+'teacher/'+'?flag=portal&token=aforetechnical@321!', {form:input},  function (error, response, body) {
			  var data = JSON.parse(body);

			  if(data.status == "Failure"){
                  res.json({'status':data.status});
			    }else if(data.status == "Success"){
                  sess = req.session; 
			      sess.user_list = data.user_list;
                  res.json({'status':data.status});
			    }
		    });
	  },   
// For change password
	  change_password:function(req,res){
	  	var inputdata = req.body;
	  	module.exports.change_save_password(req,res,inputdata);
	  },
	  change_save_password:function(req,res,inputdata){
  	    request.post({url:config.api_url+'changepassword/update'+'?token=aforetechnical@321!&password='+inputdata.password+'&newpassword='+inputdata.newpassword+'&confirmpassword='+inputdata.confirmpassword+'&member_no='+inputdata.member_no}, function(error,response,body){
	  			var data  = JSON.parse(body);
	  			if(data.status == "Failure"){
	  				res.json({'status':data.status});
	  			}else if(data.status == "Success"){
	  				res.json({'status':data.status});
	  			}
	  		});
	  },

   //Post Signin method
	  postSignin: function(req, res){
	  	 
              var inputdata = req.body;
              module.exports.insertSignin(req, res,inputdata);
           	 },

    // method call 
       insertSignin: function(req, res,input){  

    		request({url:config.api_url+'login/'+'?email='+input.email+'&password='+input.password+'&token=aforetechnical@321!'},  function (error, response, body) {
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
		
	  }, 


	  checkUser:function(req,res){  
        var sess = req.session;
        var data = {};
        if (req.body.role == 1 || req.body.role == 5) {
            QUERY = "SELECT school_id as total FROM " + req.app.get('config').eduser + " where type='"+req.body.role+"' AND school_id='"+req.body.school_id+"'";            
            
            req.app.get('connection').query(QUERY, function (err, rows, fields) {
                if (err) {
                    req.app.get('global').fclog("Error Selecting : %s ", err);
                    res.end();
                }else{       	 
                	if(rows[0]['total'] > 0){                  
                    data.existStatus = 'exist';
                    }
                	 
                 
                }
                data.status = 'success'; 
                res.json(data);
                
            });
        } 
        
	  },
}