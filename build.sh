#!/bin/bash
npm install --global gulp-cli
npm install ./modules/CoreWebclient

gulp styles --themes Default,DeepForest,Funny
gulp js:build
gulp js:min