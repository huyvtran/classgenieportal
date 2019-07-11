var config = require('../assets/json/config');
var _ = require('underscore');
var url = require('url');
var message = require('../../assets/json/' + (config.env == 'development' ? 'message' : 'message.min') + '.json');
var menu = require('../../assets/json/' + (config.env == 'development' ? 'language' : 'language.min') + '.json');
var request = require('request');
/**
 * Login model class
 *
 * @param req, res
 */
module.exports = {
    teachermanagement: function (req, res, obj) {
        var sess = req.session;

        QUERY = "SELECT * FROM " + req.app.get('config').eduser + " WHERE school_id=? and type in ('1','2','5') AND status > '-1'" ;        
        console.log(QUERY);

        req.app.get('connection').query(QUERY, [sess.user_list[0].school_id], function (err, rows, fields) {
            if (err) {
                req.app.get('global').fclog("Error Selecting : %s ", err);
                res.end();
            }
            module.exports.renderHtml(req, res, obj, rows);
        });
    },

    getDataById: function (req, res) {
        var id = req.body.teacher_id;
        var data = {};
        QUERY = "SELECT * FROM " + req.app.get('config').eduser + " WHERE id=?";
        req.app.get('connection').query(QUERY, [id], function (err, rows, fields) {
            if (err) {
                req.app.get('global').fclog("Error Selecting : %s ", err);
                res.end();
            }
            data.userDetails = rows;
            data.status = 'Success';
            res.json(data);

        });

    },

    updateTeacherById: function (req, res) {
         var data = {};
        var input = JSON.parse(JSON.stringify(req.body));

        if (input.id != 'undefined') {
            var id = input.id;
        }

        if (input.type != 'undefined') {
            var type = input.type;
        }
        
         if (input.school_id != 'undefined') {
            var school_id = input.school_id;
        }
           
       
        if(type == 1 || type == 5){  
        QUERY = "select count(type) as total from " + req.app.get('config').eduser + " WHERE  school_id='" + school_id + "' AND type='"+type+"'";           
        req.app.get('connection').query(QUERY, function (err, rows, fields) {
            
            if (err) {
                req.app.get('global').fclog("Error Selecting : %s ", err);
                res.end();
            }

            if (rows[0]['total'] > 0 ) { 
                 data.status = 'Success';
                 data.userStatus = 'exist';  
                  res.json(data);             
            }else{
             QUERY = "update " + req.app.get('config').eduser + " set type='" + type + "' WHERE id=?";
                req.app.get('connection').query(QUERY, [id], function (err, rows, fields) {
                    if (err) {
                        req.app.get('global').fclog("Error Selecting : %s ", err);
                        res.end();
                    }
                    data.status = 'Success';
                    data.userStatus = 'notexist';
                     res.json(data);
                });
            }
         });
            } else {
                QUERY = "update " + req.app.get('config').eduser + " set type='" + type + "' WHERE id=?";
                req.app.get('connection').query(QUERY, [id], function (err, rows, fields) {
                    if (err) {
                        req.app.get('global').fclog("Error Selecting : %s ", err);
                        res.end();
                    }
                    data.status = 'Success';
                    data.userStatus = 'notexist';
                    res.json(data);
                });
            }
            
    },
    renderHtml: function (req, res, obj, rows) {
        var sess = req.session;
        if (sess.user_list) {
            res.render(obj.render_page, {
                'render_page': obj.render_page,
                'menu': menu.english,
                'session': sess.user_list,
                'data': (_.size(rows) > 0 ? rows : ""),
                'title': (""),
                'meta_keyword': (''),
                'meta_desc': ('')
            });
        } else {
            req.session.error = 'Access denied!';
            res.redirect('/login');
        }
    },
}