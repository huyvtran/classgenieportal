var _ = require('underscore');
var request = require('request');
var mailUrl = require('../assets/json/config');
/**
 * Newsletter model class
 *
 * @param req, res
 */
module.exports = {
	saveNewsletter: function (req, res, obj){
		 var input = JSON.parse(JSON.stringify(req.body));
         QUERY = "SELECT email FROM "+req.app.get('config').news_letter+" WHERE status=? AND email=?";
         req.app.get('connection').query(QUERY, ['1', input.email_id], function(err, rows, fields){
	          if(err){
	             req.app.get('global').fclog("Error Selecting : %s ",err);
	             res.end();
	          }
	          if(_.size(rows)<1){
	          	 QUERY = "INSERT INTO "+req.app.get('config').news_letter+" SET email=?, created_at=?";  
	          	 req.app.get('connection').query(QUERY, [input.email_id,  req.app.get('global').js_yyyy_mm_dd_hh_mm_ss()], function(err, rows, fields){
	          	  res.json({success_msg:'Thank you for subscribe'});
	          	 res.end();
	          	 });
	          	//call api for send mail by portal 
               module.exports.sendMail(input.email_id, '13');
	          }else{
	          res.json({success_msg:'You are allready subscribed'});
	         }
         });
	},

	sendMail: function(email, id){
    	request(mailUrl.mail_url+'?email='+email+'&id='+id+'&token=aforetechnical@321!', function (error, response, body) {
			  if (!error && response.statusCode == 200) {
			    console.log(body) // Show the HTML for the Google homepage.
			  }
			})
		
	}
}