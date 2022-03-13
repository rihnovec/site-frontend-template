const path = require('path')
const entry = require('./entry.js')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const AssetsPlugin = require('assets-webpack-plugin')

module.exports = {
  entry,
  mode: 'production',
  output: {
    clean: true,
    filename: '[name]/[name].[contenthash].js',
    path: path.resolve(__dirname, './local/assets/local')
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name]/[name].[contenthash].css'
    }),
    new AssetsPlugin({
      filename: 'assets.json',
      removeFullPathAutoPrefix: true,
      includeAllFileTypes: false,
      fileTypes: ['css', 'js'],
    })
  ],
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              url: true
            }
          }
        ]
      },
      {
        test: /\.sass$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              url: true
            }
          },
          {
            loader: 'sass-loader',
            options: {
              sassOptions: {
                indentedSyntax: true
              }
            }
          }
        ]
      }
    ]
  }
}
