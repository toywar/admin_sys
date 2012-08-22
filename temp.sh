#!/bin/bash

echo 'Start'
sed -e '/^#/d' int.html > int.html
echo 'Step 1: OK!'
echo '#' >> int.html
date >> int.html
echo 'Step 2: OK!'

