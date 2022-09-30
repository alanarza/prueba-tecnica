const fs = require('fs');
const pdf = require('pdf-creator-node');
const path = require('path');
const options = require('../helpers/options');
//const data = require('../helpers/data');
const connection = require('../helpers/database')


const homeview = (req, res, next) => {
    res.render('home');
}

const generatePdf = async (req, res, next) => {
  const html = fs.readFileSync(path.join(__dirname, '../views/template.html'), 'utf-8');
  const filename = Math.random() + '_doc' + '.pdf';
  let array = [];
  let db_data = null;

  await connection.query('SELECT * FROM dogs ORDER BY id desc', function (err, rows) {
    if (err) {
      console.log(err)
    } else {
      console.log(rows)
      db_data = rows;

	     rows.forEach(d => {
	      const prod = {
	          nombre: d.nombre,
	          raza: d.raza,
	          size: d.size,
	          color: d.color
	      }
	      array.push(prod);
		  });

		  const document = {
		      html: html,
		      data: {
		          perros: array
		      },
		      path: './docs/' + filename
		  }
		  pdf.create(document, options)
      .then(res => {
          console.log(res);
      }).catch(error => {
          console.log(error);
      });
      const filepath = 'http://localhost:3000/docs/' + filename;

      res.render('download', {
          path: filepath
      });
    }
  })
}


module.exports = {
    homeview,
    generatePdf
}