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
var _ = require('underscore');



/**
 * Login model class
 *
 * @param req, res
 */
module.exports = {
    img_upload: function (req, res) {
        var data = {};        
        if (req.body.image != 'adsfas') {            
            var image = this.convertBase64Image(req.body.image);
        }
        //console.log(image);
        //var input = JSON.parse(JSON.stringify(req.files.upload));
        var data_update = [], output = {};
        var SET = "";
        if (typeof req.body.teacher_name != 'undefined') {
            SET += " name=?, ";
            data_update.push(req.body.teacher_name);
        }

        if (typeof req.body.age != 'undefined') {
            SET += " age=?, ";
            data_update.push(req.body.age);
        }

        if (typeof req.body.memberno != 'undefined') {
            var img_name = 'img_' + req.body.memberno;
        }

//        var name = input.name.split('.');
//        if (input.size > 2 * 1024 * 1024) {
//            fs.unlinkSync(input.size);
//            res.json({err: 'File greater than 2mb is not allowed'});
//            return false;
//        }
        if (req.body.image != 'adsfas') {
        var fileType = image.type;
        var name = fileType.split('/');
        if (name[1] == 'png' || name[1] == 'gif' || name[1] == 'jpg' || name[1] == 'jpeg') {
            var img_name = 'img_' + req.body.memberno + "." + name[1];
            // var data = fs.readFileSync(input.path);


            fs.writeFile('../assets/profile_image/' + img_name, image.data, function (err) {
                console.log(err);
            });
            //if (fs.existsSync(input.path)) {
            //  fs.unlinkSync(input.path);
            //}
        }
    }else{
        img_name = '';
    }

        SET = SET.trim().substring(0, SET.trim().length - 1);
        QUERY = "SELECT * FROM " + config.eduser + " WHERE  member_no=? and status > '-1' ";
        req.app.get('connection').query(QUERY, req.body.memberno, function (err, rows, fields) {
            if (err) {
                if (config.debug) {
                    req.app.get('global').fclog("Error Selecting : %s ", err);
                    res.json({error_code: 1, error_msg: message.technical_error});
                    return false;
                }
            } else {
                console.log(data_update);
                QUERY = "UPDATE " + config.eduser + "  SET " + SET + ",image='" + img_name + "', updated_at=" + " ' " + _global.js_yyyy_mm_dd_hh_mm_ss() + " ' WHERE member_no='" + req.body.memberno + "'";
                console.log(QUERY);
                req.app.get('connection').query(QUERY, data_update, function (err, rows, fields) {
                    if (err) {
                        if (config.debug) {
                            req.app.get('global').fclog("Error Updating : %s ", err);
                            res.json({error_code: 1, error_msg: message.technical_error});
                            return false;
                        }
                    } else {
                        QUERY = " SELECT * FROM " + config.eduser + " WHERE member_no=? and status > '-1' ";
                        req.app.get('connection').query(QUERY, req.body.memberno, function (err, rows, fields) {
                            if (err) {
                                if (config.debug) {
                                    req.app.get('global').fclog("Error Selecting : %s ", err);
                                    res.json({error_code: 1, error_msg: message.technical_error});
                                    return false;
                                }
                            } else {
                                data.status = 'Success';
                                res.json(data);
                            }
                        });
                    }
                });
            }
        });
    },

    convertBase64Image: function (dataString) {
        var matches = dataString.match(/^data:([A-Za-z-+\/]+);base64,(.+)$/),
                response = {};

        if (matches.length !== 3) {
            return new Error('Invalid input string');
        }

        response.type = matches[1];
        response.data = new Buffer(matches[2], 'base64');

        return response;
    }
}