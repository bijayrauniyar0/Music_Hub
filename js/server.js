// server.js

const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
const port = 3000;

// Create a MySQL connection
const connection = mysql.createConnection({
  host: 'localhost',
  user: '',
  password: '',
  database: 'musicplayer992'
});

// Connect to MySQL
connection.connect(err => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    return;
  }
  console.log('Connected to MySQL');
});

// Middleware to parse JSON bodies
app.use(bodyParser.json());

// API endpoint to fetch thumbnail based on song name
app.get('/api/thumbnail', (req, res) => {
  const songName = req.query.song;

  const query = `SELECT thumbnail FROM uploaded_data WHERE song = ?`;
  connection.query(query, [songName], (err, results) => {
    if (err) {
      console.error('Error executing MySQL query:', err);
      res.status(500).json({ error: 'Internal server error' });
      return;
    }

    if (results.length === 0) {
      res.status(404).json({ error: 'Thumbnail not found for the specified song' });
      return;
    }

    const thumbnail = results[0].thumbnail;
    res.json({ thumbnail });
  });
});

// Start the server
app.listen(port, () => {
  console.log(`Server listening at http://localhost:${port}`);
});
