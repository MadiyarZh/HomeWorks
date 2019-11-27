var mongoose = require('mongoose');

var Schema = mongoose.Schema;

var UserSchema = new Schema({
 name: {type: String, required: true},
 surname: {type: String, required: true}
}, {collection: 'Node_JS_database'});

module.exports = mongoose.model('Users', UserSchema);