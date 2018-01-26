'use strict';

var ar = [1,2,3,13,'g'];
var b = 2;
var c = 13;
var d = 'g';
var ar2 = {};

function com(aq,bq) {
  if (aq > bq) return 1;
  if (aq < bq) return -1;
}
console.log(Array.isArray(ar));