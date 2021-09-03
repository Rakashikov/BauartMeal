// const express = require('express')
// const bodyParser = require('body-parser')

// const app = express()

// app.use(bodyParser.urlencoded({ extended: true }));
// app.use(express.json())



// const hostname = process.env.HOSTNAME
// const port = process.env.PORT;


// app.use(function (req, res, next) {
//   res.status(404).send("Not Found")
// })


// app.listen(port, hostname, () => {
//   console.log('OMG ITS WORK');
// });

////////////////////

const express = require("express");
const bodyParser = require("body-parser");
const cors = require('cors')
const app = express();

app.use(cors())
app.use(bodyParser.urlencoded({ extended: true }));


const parseRouter = require("./routes/parseRouter.js");
app.use("/parser", parseRouter);

app.use(function (req, res, next) {
  res.status(404).send("Not Found");
});

app.listen(3000,'127.0.0.1', () => {
  console.log('ITS ALIVE');
});