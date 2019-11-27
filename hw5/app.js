const express = require('express');
const app = express();
const path = require('path');

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

app.get('/', (req, res) => {
	res.render('index.ejs', {
		/*data: req.params.id,
		name: req.params.name || 0*/
	})
})
app.get('/process_get',(function(req, res){
    /*response = {
      first_name:req.query.first_name,
      last_name:req.query.last_name
    };*/
    res.render('success.ejs', { first_name: req.query.first_name, last_name: req.query.last_name});
    
    /*res.end("Hello "+response.first_name + "!!! Your last name is "+response.last_name);*/
}));

app.listen(3000, function() {
	console.log("listening on 3000");
})

