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
    edit_school: function (req, res) {
        
        var data_update = [], output = {};
        var SET = "";
        if (typeof req.body.school_name != 'undefined') {
            SET += " school_name=?, ";
            data_update.push(req.body.school_name);
        }

        if (typeof req.body.web_url != 'undefined') {
            SET += " web_url=?, ";
            data_update.push(req.body.web_url);
        }

        if (typeof req.body.school_address != 'undefined') {
            SET += " address=?, ";
            data_update.push(req.body.school_address);
        }

        if (typeof req.body.school_city != 'undefined') {
            SET += " city=?, ";
            data_update.push(req.body.school_city);
        }

        if (typeof req.body.school_state != 'undefined') {
            SET += " state=?, ";
            data_update.push(req.body.school_state);
        }

        if (typeof req.body.school_country != 'undefined') {
            SET += " country=?, ";
            data_update.push(req.body.school_country);
        }
        if (typeof req.body.pin_code != 'undefined') {
            SET += " pincode=?, ";
            data_update.push(req.body.pin_code);
        }

        if (typeof req.body.school_phone != 'undefined') {
            SET += " phone=?, ";
            data_update.push(req.body.school_phone);
        }
        SET = SET.trim().substring(0, SET.trim().length - 1);
        QUERY = "UPDATE " + config.edschools + "  SET " + SET + ", updated_at=" + " ' " + _global.js_yyyy_mm_dd_hh_mm_ss() + " ' WHERE school_id='" + req.body.school_id + "'";
        
        req.app.get('connection').query(QUERY, data_update, function (err, rows, fields) {
            if (err) {
                if (config.debug) {
                    req.app.get('global').fclog("Error Updating : %s ", err);
                    res.json({error_code: 1, error_msg: message.technical_error});
                    return false;
                }
            } else {
                QUERY = " SELECT * FROM " + config.edschools + " WHERE school_id=? ";
                req.app.get('connection').query(QUERY, req.body.school_id, function (err, rows, fields) {
                    if (err) {
                        if (config.debug) {
                            req.app.get('global').fclog("Error Selecting : %s ", err);
                            res.json({error_code: 1, error_msg: message.technical_error});
                            return false;
                        }
                    } else {
                        res.redirect('/accountsetting');
                    }
                });
            }
        });


    },

    /**
     * All the request of School Update by Post Method 
     *
     * @param req, res
     * @return response
     */
    school_update: function (req, res) {        
        var data = [], output = {};
        var SET = "";
        var input = JSON.parse(JSON.stringify(req.body));        
        if (typeof input.school_name != 'undefined') {
            SET += " school_name=?, ";
            data.push(input.school_name.trim());
        }
        if (typeof input.web_url != 'undefined') {
            SET += " web_url=?, ";
            data.push(input.web_url.trim());
        }
        if (typeof input.address != 'undefined') {
            SET += " address =?, ";
            data.push(input.address.trim());
        }
        if (typeof input.city != 'undefined') {
            SET += " city=?, ";
            data.push(input.city.trim());
        }
        if (typeof input.state != 'undefined') {
            SET += " state=?, ";
            data.push(input.state.trim());
        }
        if (typeof input.country != 'undefined') {
            SET += " country=?, ";
            data.push(input.country.trim());
        }
        if (typeof input.pin_code != 'undefined') {
            SET += " pin_code=?, ";
            data.push(input.pin_code.trim());
        }
        if (typeof input.phone != 'undefined') {
            SET += " phone=?, ";
            data.push(input.phone.trim());
        }
        SET = SET.trim().substring(0, SET.trim().length - 1);
        QUERY = "SELECT * FROM " + config.edschools + " WHERE  school_id='" + input.school_id + "'";         
        req.app.get('connection').query(QUERY, function (err, rows, fields) {
            if (err) {
                if (config.debug) {
                    req.app.get('global').fclog("Error Selecting : %s ", err);
                    res.json({error_code: 1, error_msg: message.technical_error});
                    return false;
                }
            } else if (_.size(rows) < 0) {
                res.json({'status': message.failure, 'comments': message.nodata});
            } else
            {
                QUERY = "UPDATE " + config.edschools + " SET " + SET + ", updated_at=" + " ' " + _global.js_yyyy_mm_dd_hh_mm_ss() + " 'WHERE school_id='" + input.school_id + "'";                 
                req.app.get('connection').query(QUERY, data, function (err, rows, fields) {
                    if (err) {                          
                        if (config.debug) {
                            req.app.get('global').fclog("Error Selecting : %s ", err);
                            res.json({error_code: 1, error_msg: message.technical_error});
                            return false;
                        }
                    } else
                    {
                        QUERY = " SELECT * FROM " + config.edschools + " WHERE school_id ='" + input.school_id + "'";
                      
                        req.app.get('connection').query(QUERY, data, function (err, rows, fields) {
                            if (err) {
                                if (config.debug) {
                                    req.app.get('global').fclog("Error Selecting : %s ", err);
                                    res.json({error_code: 1, error_msg: message.technical_error});
                                    return false;
                                }
                            } else
                            {
                                output.timestamp = req.query.timestamp;
                                output.status = message.success;
                                output.comments = message.success;
                                output.user_list = rows;
                                // mongo_connection.save({request_ip:req.ip, request_url:req.originalUrl, request_method:'POST', text:serialize.serialize(output)}, 'school_update_access');
                                res.json(output);
                            }
                        });
                    }
                });
            }
        });

    }
}