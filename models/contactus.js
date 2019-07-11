var _ = require('underscore');
var config = require('../assets/json/config');
var mailUrl = require('../assets/json/config');

/**
 * Newsletter model class
 *
 * @param req, res
 */
module.exports = {
	savecontactUs: function (req, res, obj){
		 
		 var input = JSON.parse(JSON.stringify(req.body));
         QUERY = "SELECT email FROM "+req.app.get('config').contactus+" WHERE status=? AND email=?";
         req.app.get('connection').query(QUERY, ['1', input.email], function(err, rows, fields){
	          if(err){
	             req.app.get('global').fclog("Error Selecting : %s ",err);
	             res.end();
	          }
	          if(_.size(rows)<1){
	          	 QUERY = "INSERT INTO "+req.app.get('config').contactus+" SET name=?, email=?, message=?, created_at=?, updated_at=?";  
	          	 req.app.get('connection').query(QUERY, [input.name, input.email, input.message,  req.app.get('global').js_yyyy_mm_dd_hh_mm_ss(), req.app.get('global').js_yyyy_mm_dd_hh_mm_ss()], function(err, rows, fields){
	          	 	res.json({success_msg:'Thank you for Contact Us', email:input.email});
	          	 	res.end();
	          	 });
	          }
	          res.json({success_msg:'Thank you for Contact Us', email:input.email, 'mail_url':mailUrl.mail_url});
         });
	}
}