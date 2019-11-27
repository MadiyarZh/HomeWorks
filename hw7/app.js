var express = require('express');
var path = require('path');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');

var app = express();
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.use(bodyParser.urlencoded({ extended: false }));

var mongoDB = 'mongodb://127.0.0.1/Node_JS_database';
mongoose.connect(mongoDB,{ useNewUrlParser: true, useUnifiedTopology: true  });


var Users = require('./mongoose.js');
app.get('/', (req, res) => {
  Users.find({}, function(err, users){
    if(err){
      console.log(err);
    }else{
      res.render('index.ejs', { data: users});
    }
  });
});

//create new user
app.get('/create',  (req, res)=>{
  res.render('create.ejs');
});

app.post('/insert', (req, res)=>{
  var user = new Users({
      name: req.body.name,
      surname: req.body.surname
    });

  user.save(function(err, ){
    if(err){
      console.log(err);
      return err;
    }
  });

  res.redirect('/');

});

app.get('/edit/:id',  (req, res)=>{
  Users.findById(req.params.id, function(err, users){
    if(err){
      console.log(err);
    }else{
      res.render('update.ejs', { data: users });
    }
  });
});

//UPDATE USER POST
app.post('/update/:id', function(req, res){
  Users.findById(req.params.id, function(err, users){
    if(err){
      console.log(err);
    }else{
      users.name = req.body.name;
      users.surname = req.body.surname;
      
      users.save(function(err, ){
        if(err){
          console.log(err);
          return err;
        }
      });
      res.redirect('/');
    }
  });
});

//DELETE USER GET FORM 
app.get('/delete/:id', function(req, res){
  res.render('delete', {
    title: 'Delete Users', 
    id: req.params.id
  });
});

//DELETE USER POST
app.post('/remove/:id', function(req, res){
  Users.findByIdAndRemove(req.params.id, function(err){
    if (err) throw err;
    res.redirect('/');
  });
});


app.listen(3000);