
var models = require('../models/content');
var newsletter_models = require('../models/newsletter');
var contactus_models = require('../models/contactus');
var status = require('../models/status');
var forgot_password_models = require('../models/forgot_password');
var login_models = require('../models/login');
var accountSetting = require('../models/accountsetting');
var edit_profile = require('../models/edit_profile');
var classmanagement = require('../models/classmanagement');
var csvfile = require('../models/importcsvfile');
var teachermanagement = require('../models/teachermanagement');
var add_student = require('../models/add_student');
var img_upload = require('../models/img_upload');
var edit_school = require('../models/edit_school');
var remove_teacher =require('../models/remove_teacher');
var change_status =require('../models/change_status');
var countries =require('../models/countries');

/*
/*
 * GET old home page.
 */

exports.commingsoon = function(req, res){ 
  res.render('commingsoon');
};


/*
/*
 * Edit personal info
 */
exports.img_upload = function(req, res){
   img_upload.img_upload(req, res);
};

/*
/*
* Edit School Info
*/

exports.edit_school = function(req,res){
    edit_school.edit_school(req,res);
};

/*
/*
* Delete teacher account remove_teacher
*/
exports.remove_teacher = function(req,res){
    remove_teacher.remove_teacher(req,res);
};

/*
/*
* change teacher status
*/
exports.change_status = function(req,res){
    change_status.change_status(req,res);
};
/*
 * GET status page.
 */
exports.status = function(req, res){ 
    status.getContent(req, res, {'render_page':'message'});
}; 

/*
 * GET new home page .
 */
exports.index = function(req, res){
    models.getContent(req, res, {'render_page':'index', 'id':1});
};

/*
 * GET about page .
 */
exports.about = function(req, res){
    models.getContent(req, res, {'render_page':'about', 'id':2});
};

/*
 * GET features page .
 */
exports.features = function(req, res){
    models.getContent(req, res, {'render_page':'features', 'id':3});
};

/*
 * GET blog page .
 */
exports.blog = function(req, res){
    models.getContent(req, res, {'render_page':'blog', 'id':4});
};

/*
 * GET support page .
 */
// exports.support = function(req, res){
//     models.getContent(req, res, {'render_page':'support', 'id':5});
// };

/*
 * GET Contact page .
 */
exports.contact = function(req, res){
    models.getContent(req, res, {'render_page':'contact', 'id':5});
};

/*
 * GET privecy page .
 */
exports.privecy = function(req, res){
    models.getContent(req, res, {'render_page':'privecy', 'id':6});
};

/*
 * GET terms page .
 */
exports.terms = function(req, res){
    models.getContent(req, res, {'render_page':'terms', 'id':7});
};

/*
 * GET terms page .
 */
exports.blog = function(req, res){
    models.getContent(req, res, {'render_page':'blog', 'id':8});
};

/*
 * POST newsletter
 */
exports.newsletter = function(req, res){
   newsletter_models.saveNewsletter(req, res);
};

/*
 * POST contactus
 */
exports.contactus = function(req, res){
   contactus_models.savecontactUs(req, res);
};

/*
 * GET Login
 */

exports.login = function(req, res){
     
    login_models.getContent(req, res, {'render_page':'login'});
};

/*
 * Post signup
 */
exports.post_signup = function(req, res){
    login_models.postSignup(req, res);
};

/*
 * Post signin
 */
exports.post_signin = function(req, res){

    login_models.postSignin(req, res);
};

/*
*change_password
*/
exports.change_password  = function(req,res){
    login_models.change_password(req,res);
};


/*
*check user for role principal and vice principal
*/
exports.checkUser  = function(req,res){
    login_models.checkUser(req,res);
};


/*
*change_password
*/
exports.getschoollist  = function(req,res){
    login_models.school_list(req,res);
};

/*
 * GET accountSetting 
 */

exports.accountsetting = function(req, res, sess){   
    accountSetting.accountsetting(req, res, {'render_page':'accountsetting'});
};



/*
 * GET user profile data 
 */

exports.userProfile = function(req, res, sess){
    console.log("hi");
    accountSetting.userProfile(req, res,{'render_page':'edit_profile'});
};

/*
 * GET class management
 */

exports.classmanagement = function(req, res, sess){
    classmanagement.classmanagement(req, res, {'render_page':'classmanagement'});
};

/*
 * Post add class
 */
exports.add_class = function(req, res){
      classmanagement.add_class(req, res);
};

/*
 * GET teacher management
 */

exports.teachermanagement = function(req, res, sess){
    teachermanagement.teachermanagement(req, res, {'render_page':'teachermanagement'});
};




/*
 * GET teacher management details by id
 */

exports.getTeacherById = function(req, res){    
    teachermanagement.getDataById(req, res);
};


/*
 * update teacher details by id
 */

exports.updateTeacherById = function(req, res){    
    teachermanagement.updateTeacherById(req, res);
};


/*
* GET CLASS LIST
*/

/*
 * GET remove cache
 */
exports.removecache = function(req, res){
    models.removeCache(req, res);
};

/*
 * GET forgot password
 */
exports.forgot_password = function(req, res){
    forgot_password_models.getContent(req, res, {'render_page':'forgot_password', 'id':1});
};

/*
 * Post forgot password
 */
exports.post_forgot_password = function(req, res){
    forgot_password_models.postForgotPassword(req, res);
};

/*
 * Post edit profile
 */
exports.edit_profile = function(req, res){
      edit_profile.edit_profile(req, res);
};

/*
 * import csv file here
 */

exports.importcsvfile = function(req, res){ 
    csvfile.getContent(req, res, {'render_page':'upload_studentlist',classId:req.body.id,classname:req.body.classname});
};
    


exports.add_student = function(req, res){ 
    add_student.getContent(req, res, {'render_page':'add_student',classId:req.body.id,classname:req.body.classname});
};


exports.studentListPortal = function(req, res){ 
    add_student.studentListPortal(req, res);
};
    
exports.savestudentlist = function(req,res){
    classmanagement.savestudentlist(req, res);
}

exports.saveCsvFile = function(req, res){
    //console.log('here11');
    csvfile.saveCsvFile(req, res);
};


/**
  * School_Update.  
  * @params req, res
  */
 exports.school_update = function (req, res){
   
        edit_school.school_update(req, res);
     
 }


 /**
  * countries.  
  *  
  */
 exports.countries = function (req, res){
   
        countries.countries(req, res);
     
 }

