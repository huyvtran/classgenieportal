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
    accountsetting: function (req, res, obj) {
        var sess = req.session;
        if (sess.user_list) {
            QUERY = "SELECT * FROM " + req.app.get('config').eduser + " where member_no=" + sess.user_list[0].member_no + "";
            req.app.get('connection').query(QUERY, function (err, rows_userdata, fields) {
                if (err) {
                    req.app.get('global').fclog("Error Selecting : %s ", err);
                    res.end();
                }
                QUERY = "SELECT * FROM " + req.app.get('config').edschools + " where school_id=" + sess.user_list[0].school_id + "";
                req.app.get('connection').query(QUERY, function (err, rows_schooldata, fields) {
                    if (err) {
                        req.app.get('global').fclog("Error Selecting : %s ", err);
                        res.end();
                    }
                    res.render(obj.render_page, {
                        'render_page': obj.render_page,
                        'menu': menu.english,
                        'userdata': rows_userdata,
                        'session': sess.user_list,
                        'school_detail': rows_schooldata,
                        'config': config,
                        'title': (""),
                        'meta_keyword': (''),
                        'meta_desc': ('')
                    });
                });
            });
        } else {
            req.session.error = 'Access denied!';
            res.redirect('/login');
        }
    },

    
}   
 
	   
 
