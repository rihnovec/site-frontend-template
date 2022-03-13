const path = require('path')
const entry = require('./entry.js')

module.exports = {
  entry,
  mode: 'development',
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist/[name]')
  }
}
