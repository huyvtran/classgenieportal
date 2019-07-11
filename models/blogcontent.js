var _ = require('underscore');
/**
 * saveBlogs model class
 *
 * @param req, res
 */
module.exports = {
	saveBlogs: function (req, res, obj){
		 var input = JSON.parse(JSON.stringify(req.body));
         QUERY = "SELECT * FROM "+req.app.get('config').blogs+" order by id desc";
         req.app.get('connection').query(QUERY,  function(err, rows, fields){
	          if(err){
	             req.app.get('global').fclog("Error Selecting : %s ",err);
	             res.end();
	          }
	         module.exports.renderHtml(req, res, obj, rows);
	    });
	},

renderHtml: function(req, res, obj, rows){
	     res.render(obj.render_page,{
      	     'blogcontent': (_.size(rows)>0 ? rows[0].description : ""),
	        });
	 },
}