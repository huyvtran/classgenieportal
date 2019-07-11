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
    change_status: function (req, res) {
        console.log(req.body);
        var data = {};
        if (req.body.flag == 2) {
            QUERY = "UPDATE  " + req.app.get('config').eduser + " SET status= '0' WHERE member_no='" + req.body.member_no + "'";
            } else {
            QUERY = "UPDATE  " + req.app.get('config').eduser + " SET status= '1' WHERE member_no='" + req.body.member_no + "'";
           }
        req.app.get('connection').query(QUERY, function (err, rows, result) {
            if (err) {
                if (config.debug) {
                    req.app.get('global').fclog("Error Selecting : %s ", err);
                    res.json({error_code: 1, error_msg: message.technical_error});
                    return false;
                }
            }
            data.status = 'Success';
            res.json(data);

        });
    }
}