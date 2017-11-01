#!/bin/bash
npm install -g gulp-cli
npm install ./modules/CoreWebclient

gulp styles --themes Default,DeepForest,Funny
gulp js:build
gulp js:min
gulp test

if [ "$1" != "" ]; then
	zip -r $1.zip favicon.ico robots.txt composer.json modules.json
fi