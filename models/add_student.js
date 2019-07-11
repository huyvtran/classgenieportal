var config = require('../assets/json/config');
var _global = require('../assets/common/global');
var _ = require('underscore');
var url = require('url');
var path = require('path');
var fs = require('fs');
var parse = require('csv-parse');
var message = require('../../assets/json/' + (config.env == 'development' ? 'message' : 'message.min') + '.json');
var menu = require('../../assets/json/' + (config.env == 'development' ? 'language' : 'language.min') + '.json');
var request = require('request');
/**
 * Login model class
 *
 * @param req, res
 */
module.exports = {
    getContent: function (req, res, obj) {
       
        var sess = req.session;
        res.render(obj.render_page, {
            'render_page': obj.render_page,
            'menu': menu.english,
            'title': (""),
            'meta_keyword': (''),
            'meta_desc': (''),
            'config': config,
            'session': sess.user_list,
            'classId':obj.classId,
            'classname':obj.classname,
        });
    },

    studentListPortal: function (req, res, obj) {
        var query_str = url.parse(req.url,true).query;
        //var page_size = 10;
        //var start_record_index = (query_str.page_number-1)*page_size;
       // var limit = (typeof start_record_index != 'undefined' && typeof page_size != 'undefined' && start_record_index>-1 && page_size != '') ? " LIMIT "+start_record_index+" ,"+page_size:" LIMIT 0,"+page_size;
             
        var sess = req.session;
        var data = {};
        if (sess.user_list) {
            QUERY = "SELECT name as stu_name,parent_no,student_no FROM " + req.app.get('config').studentinfo + " where class_id='"+query_str.classId+"' order by id desc";            
            
            req.app.get('connection').query(QUERY, function (err, rows, fields) {
                if (err) {
                    req.app.get('global').fclog("Error Selecting : %s ", err);
                    res.end();
                }else{
                  data.status = 'success';
                  data.studentList = rows;
                  res.json(data);
                }
                
            });
        }  
    },
}