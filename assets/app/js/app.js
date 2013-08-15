'use strict';

// right now
var now = new Date();
now.setHours(0,0,0,0);

// one month from now
var oneMonth = new Date(now.getFullYear(), now.getMonth()+1, now.getDate());

var next30days = new RRule({
  freq: RRule.DAILY, 
  count: 30,
  byhour: [0],
  byminute: [0],
  bysecond: [0]
});

//--------------------------------------

var Calendar = function() {
  var cal = this;
  this.dates = {};
};

Calendar.prototype.addBill = function(bill) {
  var calDates = this.dates;

  _.each(bill.dates.between(now, oneMonth), function(billDate) {
      var key = billDate.getTime();

      if (!calDates.hasOwnProperty(key)) {
        calDates[key] = [];
      }
      
      calDates[key].push({title: bill.title, amount: bill.amount});
  });
};

var calendar = new Calendar();

//--------------------------------------

var Bill = function(title, amount, dates) {
  this.title = title;
  this.amount = amount;
  this.dates = dates;
};

// --------------------------------------
// Bill Configuration
// --------------------------------------

calendar.addBill(new Bill(
  'paycheck',
  1707.85,
  new RRule({
    freq: RRule.WEEKLY,
    count: 0,
    interval: 2,
    byweekday: RRule.FR,
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'rent',
  -1001.78,
  new RRule({
    freq: RRule.MONTHLY,
    count: 0,
    bymonthday: [1],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'Verizon',
  -150,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [8],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'FPL',
  -130,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [8],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'Care Credit',
  -28,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [12],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'City of Melbourne (Water)',
  -80,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [13],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'Brighthouse',
  -83,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [18],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'Hulu',
  -7,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [25],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'Progressive',
  -123,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [26],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'Media Temple',
  -20,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [31],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

calendar.addBill(new Bill(
  'Xbox Live',
  -10,
  new RRule({
    freq: RRule.MONTHLY, 
    count: 0,
    bymonthday: [31],
    byhour: [0],
    byminute: [0],
    bysecond: [0]
  })
));

// --------------------------------------

var $calendar = $('#calendar');


_.each(next30days.all(), function(date) {
  var key = date.getTime();

  if (!calendar.dates.hasOwnProperty(key)) return;
  
  var $bills = $('<ul />');

  _.each(calendar.dates[key], function(bill) {
    $bills.append('<li>'+bill.title+' ($'+bill.amount+')</li>');
  });

  var date = new Date(parseInt(key)).toDateString();

  var $date = $('<li />').text(date).append($bills);

  $calendar.append($date);
});




