const path = require('path');

const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    entry: {
        app: './assets/app.js',
        alpine: './assets/alpine.js'
    },
    output: {
        path: path.resolve(__dirname, 'assets/dist'),
        filename: 'js/[name].js'
    },
    // watchOptions: {
    //     ignored: [
    //         "*.php",
    //         "**/*.php",
    //         "**/node_modules"
    //     ]
    // },
    module: {
        rules: [
            {
                test: /\.(|m)js(|x)0$/,
                exclude: /node_modules/,
                loader: "babel-loader",
            },
            {
                test: /\.css$/i,
                use: [ MiniCssExtractPlugin.loader, 'css-loader','postcss-loader',],

            },
            {
                test: /\.s(c|a)ss$/i,
                use: [ MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader'],

            },
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'img/[name][hash][ext][query]'
                }
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                type: 'asset/resource',
                generator: {
                    filename: 'fonts/[name][hash][ext][query]'
                }
            },
        ]
    },
    plugins: [
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({
            filename: 'css/[name].css'
        })
    ]
}