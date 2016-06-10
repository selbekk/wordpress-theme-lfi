const webpack = require('webpack');
const path = require('path');

export default {
    entry: 'js/main.js',
    output: {
        path: path.join(__dirname, 'app', 'resources'),
        filename: 'bundle.js'
    },
    module: {
        loaders: [
            { test: /\.scss$/, loader: }
        ]
    }
}
