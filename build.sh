#!/bin/bash
npm install -g gulp-cli
#npm install -g newman
npm install ./modules/CoreWebclient

gulp styles --themes Default,DeepForest,Funny
#gulp js:build
#gulp js:min




#newman run tests/bitcoinz.postman_collection.json -e tests/tests.postman_environment.json
