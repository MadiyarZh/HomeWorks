var fs = require('fs');

var contents = fs.readFileSync('input.txt', 'utf8');
console.log('Succesfully read from input.txt file');

fs.writeFile('output.txt', contents +' Hello World', function (err) {
  if (err) throw err;
  console.log("Successfully written to a output.txt file");
});