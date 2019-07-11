var routes = require('./routes/index');
var multer  = require('multer');
var upload = multer({dest: 'assets/'});
useApp = function (app){
    app.use(function(req, res, next) {
    	     res.header('Access-Control-Allow-Origin', '*');
	         res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE');
	         res.header('Access-Control-Allow-Headers', 'Content-Type');
	         next();
    	});
	
	app.get('/', routes.index);
	app.get('/index', routes.index);        
	app.get('/commingsoon', routes.commingsoon);
	app.get('/about', routes.about);
	app.get('/features', routes.features);
	app.get('/blog', routes.blog);
	app.get('/message', routes.status); 
    //app.get('/support', routes.support);
	app.get('/contact', routes.contact);
	app.get('/privecy', routes.privecy);
	app.get('/terms', routes.terms);
	app.post('/newsletter', routes.newsletter);
    app.get('/forgot_password', routes.forgot_password);
	app.post('/forgot_password', routes.post_forgot_password);
	app.get('/login', routes.login);
	app.post('/signup', routes.post_signup);
	app.post('/signin', routes.post_signin);
	// app.post('/edit_profile', upload.single('upload'), function(req, res, next){
 //       console.log(req.file);
	// });
	app.get('/accountsetting',routes.accountsetting);
	app.get('/classmanagement',routes.classmanagement);
	app.post('/add_class',routes.add_class);
	app.post('/add_student',routes.add_student);
	app.get('/studentListPortal',routes.studentListPortal);
	app.get('/teachermanagement',routes.teachermanagement);
	app.post('/getTeacherById',routes.getTeacherById);
	app.post('/updateTeacherById',routes.updateTeacherById);
	//app.post('/getschoollist',routes.getschoollist);
	app.post('/img_upload',routes.img_upload);
    app.post('/edit_school',routes.edit_school);
    app.post('/remove_teacher',routes.remove_teacher);
    app.post('/change_status',routes.change_status);
	app.post('/contactus', routes.contactus);  
    app.post('/upload_studentlist', routes.importcsvfile);
    //app.get('/upload_studentlist', routes.importcsvfile);
    app.post('/saveCsvFile', routes.saveCsvFile);
    app.post('/savestudentlist',routes.savestudentlist);
	app.get('/logout', function (req, res) {
		  req.session.destroy(function(err) {
			  if(err) {
			    console.log(err);
			  } else {
			    res.redirect('/login');
			  }
			 }); 
			});  
	app.get('/removecache', routes.removecache); 
	app.post('/change_password',routes.change_password);
	app.post('/checkUser',routes.checkUser);
    app.post('/school_update', routes.school_update); 
    /* all country list */
    app.post('/countries',routes.countries);

}

module.exports.useApp = useApp; 