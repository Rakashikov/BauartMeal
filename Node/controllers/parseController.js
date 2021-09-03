const parser = require('../models/parser')

module.exports.parse = async function (request, response) {
    response.send(await parser.parse(request.body.url, request.body.flag))
    // let url = response.body.url
    // let type = response.body.type
    // response.send(await parser.parse(url, type))
};

