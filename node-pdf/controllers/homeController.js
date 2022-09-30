const fs = require('fs');
const pdf = require('pdf-node');
const path = require('path');

const homeview = (req, res, next) => {
	res.render('home');
}

module.exports = {
	homeview
}