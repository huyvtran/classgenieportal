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

    /* .....................upload class student name with csv file here........................*/
    saveCsvFile: function (req, res) {        
        var inputData = req.body;          
        imageQuery = "SELECT image FROM ed_image where type = 2 ORDER BY RAND() limit 1";
             req.app.get('connection').query(imageQuery, function(err, rows, fields){
               if(err){
                  if(config.debug){
                      req.app.get('global').fclog("Error Selecting : %s ",err);
                      res.json({error_code:1, error_msg:message.technical_error});
                      return false;
                    }
               }else{
                  stu_img = rows[0];
                  var image = stu_img['image'];
             }     
             var csvData = [];
             fs.createReadStream(req.files.importcsvfile.path)
                .pipe(parse({delimiter: ','}))
                .on('data', function (csvrow) {                    
                    csvData.push(csvrow);
                })
                .on('end', function () {                     
                     var lengthValue = csvData.length;
                     var created_at =  _global.js_yyyy_mm_dd_hh_mm_ss();  
                     for(var i = 0;i<lengthValue;i++){
                        var parent_no = _global.getCode('P');
                        var student_no = _global.getCode('S');
                        csvData[i].push(student_no);
                        csvData[i].push(parent_no);
                        csvData[i].push(image);
                        csvData[i].push(inputData.classId);
                        csvData[i].push('0');
                        csvData[i].push(created_at);                      
                       } 
                       QUERY = "insert into ed_studentinfo (name,student_no,parent_no,image,class_id,status,created_at) values ?";   
                        req.app.get('connection').query(QUERY,[csvData], function (err, rows, fields) {
                        if (err) {                             
                            req.app.get('global').fclog("Error Selecting : %s ", err);
                            res.end();
                        }else{
                        res.redirect('/classmanagement');
                    }
                });
                    });
            });
         }
     }