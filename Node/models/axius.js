const axios = require("axios")

module.exports.getHtml = async (URL) => {
    // TODO: ��������� ������� DOM
    let response = await axios.get(URL).catch(function(error){
        throw error;
    });
    return response.data;
}
