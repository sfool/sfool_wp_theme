const webpack = require('webpack');
const path = require('path');

module.exports = {
  // モード値を production に設定すると最適化された状態で、
  // development に設定するとソースマップ有効でJSファイルが出力される
  mode: 'development',
  // mode: 'production',

  // エントリーポイントの設定
  entry: './_src/js/main.js',

  // 出力の設定
  // gulpのタスクで設定した出力ディレクトリからのパス
  output: {
    filename: 'script.js'
  },

  // パスの設定
  resolve: {
    modules: [
      path.resolve(__dirname, '_src/js'),
      'node_modules'
    ]
  },

  module: {
    rules: [
      {
        // 拡張子 .js の場合
        test: /\.js$/,
        use: [
          {
            // Babel を利用する
            loader: 'babel-loader',
            // Babel のオプションを指定する
            options: {
              presets: [
                // プリセットを指定することで、ES2020 を ES5 に変換
                ['@babel/preset-env']
              ]
            }
          }
        ],
        // node_modules は除外する
        exclude: /node_modules/,
      }
    ]
  },

  // ソースマップを有効にする
  devtool: 'source-map',

  plugins: [
    // jQueryを全てのプラグインから使えるようにするため
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery'
    })
  ]
}