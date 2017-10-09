#!/bin/bash
npm install -g gulp-cli
npm install ./modules/CoreWebclient

gulp styles --themes Default,DeepForest,Funny
gulp js:build
gulp js:min
gulp test

