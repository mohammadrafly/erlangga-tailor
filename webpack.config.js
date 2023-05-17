const path = require('path');

module.exports = {
  mode: 'development',
  entry: './src/index.js', // Your entry point file
  output: {
    path: path.resolve(__dirname, 'public/js'), // Output directory for bundled JavaScript files
    filename: 'bundle.js', // Output filename
  },
  module: {
    rules: [
      // Define any necessary loaders for your project (e.g., Babel for transpiling)
      // Example:
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
    ],
  },
};
