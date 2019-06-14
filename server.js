const http = require('http');
const app = http.createServer(function (req, res) {
    res.write('Hello World!'); //write a response
    res.end(); //end the response
})
const port = 8080;

app.listen(port, (err) => {
    if (err) {
        return console.log('something bad happened', err);
    }

    console.log(`server is listening on ${port}`);
});
