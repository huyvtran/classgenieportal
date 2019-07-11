var config = require('../assets/json/config');
var _ = require('underscore');
var url = require('url');
var message = require('../../assets/json/' + (config.env == 'development' ? 'message' : 'message.min') + '.json');
var menu = require('../../assets/json/' + (config.env == 'development' ? 'language' : 'language.min') + '.json');
var request = require('request');
var _global = require('../assets/common/global');

/**
 * Login model class
 *
 * @param req, res
 */
module.exports = {
    classmanagement: function (req, res, obj) {
        var sess = req.session;
        if (sess.user_list) {
            res.render(obj.render_page, {
                'render_page': obj.render_page,
                'menu': menu.english,
                'session': sess.user_list,
                'title': (""),
				'config':config,
                'meta_keyword': (''),
                'meta_desc': ('')
            });
        } else {
            req.session.error = 'Access denied!';
            res.redirect('/login');
        }
    },
     add_class: function (req, res) {
        var inputdata = req.body;
          var sess = req.session;
         request.post({url:config.api_url+'classinfo'+'?grade='+req.body.grade+'&teacher_ac_no='+req.body.teacher_ac_no+'&school_id='+sess.user_list[0].school_id+'&class_name='+req.body.class_name+'&token=aforetechnical@321!'}, function (error, response, body) {
              var data = JSON.parse(body);
            if (data.status == "Failure") {
                res.json({'status': data.status});
            } else if (data.status == "Success") {
                res.json({'status': data.status});
            }else if(data.error_code == '1'){
                 res.json({'status': data.error_msg});
            }
        });
    },
    savestudentlist: function (req, res) {
        imageQuery = "SELECT image FROM ed_image where type = 2 ORDER BY RAND() limit 1";
        req.app.get('connection').query(imageQuery, function (err, rows, fields) {
            if (err) {
                if (config.debug) {
                    req.app.get('global').fclog("Error Selecting : %s ", err);
                    res.json({error_code: 1, error_msg: message.technical_error});
                    return false;
                }
            } else {
                stu_img = rows[0];
                var image = stu_img['image'];
            }
            var req_length = Object.keys(req.body).length - 2;
            var created_at = _global.js_yyyy_mm_dd_hh_mm_ss();
            var stuData = [];
            var textboxR = '';
            var text = '';
            for (var i = 0; i < req_length; i++) {
                var parent_no = _global.getCode('P');
                var student_no = _global.getCode('S');
                var count = i + 1;
                textboxR = req.body['textbox' + count];
                stuData.push({
                    name: textboxR,
                    student_no: student_no,
                    parent_no: parent_no,
                    image: image,
                    class_id: req.body.classId,
                    status: '0',
                    created_at: created_at
                });
            }
            var stu_value = '';
            _.forEach(stuData, function (obj) {
                stu_value += ',' + "('" + obj.name + "','" + obj.student_no + "','" + obj.parent_no + "','" + obj.image + "','" + obj.class_id + "','" + obj.status + "','" + obj.created_at + "')";
            });
            stu_value = stu_value.substr(1);
            var QUERY = "insert into ed_studentinfo (name,student_no,parent_no,image,class_id,status,created_at) VALUES" + (stu_value);
            req.app.get('connection').query(QUERY, function (err, rows, fields) {
                if (err) {
                    req.app.get('global').fclog("Error Inserting: %s ", err);
                    return false;
                } else {
                    res.redirect('/classmanagement');
                }
            });
        });
    }
}