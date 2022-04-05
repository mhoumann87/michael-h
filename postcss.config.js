module.exports = {
  plugins: [
    require('postcss-import'),
    require('autoprefix'),
    require('postcss-preset-env')({ stage: 1 }),
  ],
};
