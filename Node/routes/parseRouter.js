const express = require('express')
const parseController = require('../controllers/parseController')
const parseRouter = express.Router()


parseRouter.post("/get", parseController.parse);

module.exports = parseRouter;