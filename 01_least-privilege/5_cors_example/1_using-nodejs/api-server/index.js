// api-server/index.js

const express = require('express');
const cors = require('cors');

const app = express();

// BAD: Allow all origins (for demo, toggle this)
// app.use(cors()); // Bad: allows *

// GOOD: Restrict to trusted origin only
app.use(cors({
  origin: 'http://10.1.134.219:3000'  // Only allow legit frontend
}));

app.get('/data', (req, res) => {
  res.json({ secret: 'This is top secret data!' });
});

app.listen(5000, () => console.log('API running on port 5000'));
