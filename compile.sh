#!/bin/bash
# compile and cp over js
webpack -p
rm -f Backend/src/js/bundle.min.js
cp src/js/bundle.min.js Backend/src/js