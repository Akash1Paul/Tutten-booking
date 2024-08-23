<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Booking App</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <style>
      .eventClass a {
          background-color: red !important;
          color: #FFF !important;
          cursor: none;
      }
      .ui-datepicker .ui-datepicker-header .ui-datepicker-next{
        content: "";
        display: inline-block !important;
        width: 0;
        height: 0;
        border-left: 20px solid #2655d7;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        vertical-align: middle;
        background-color: white;
      }
      .ui-datepicker .ui-datepicker-header .ui-datepicker-prev.ui-state-disabled, .ui-datepicker .ui-datepicker-header .ui-datepicker-next.ui-state-disabled {
        content: "";
        display: inline-block !important;
        width: 0;
        height: 0;
        border-left: 20px solid #2655d7;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        vertical-align: middle;
        background-color: white;
        transform: rotate(180deg);
      }
      .ui-datepicker .ui-datepicker-header .ui-datepicker-prev {
    left: 10px;
    content: "";
        display: inline-block !important;
        width: 0;
        height: 0;
        border-left: 20px solid #2655d7;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        vertical-align: middle;
        background-color: white;
        transform: rotate(180deg);
}
      .ui-datepicker .ui-datepicker-header .ui-datepicker-prev:hover, .ui-datepicker .ui-datepicker-header .ui-datepicker-next:hover {
      background: none ;
}
  </style>
 

</head>
<body>
<!-- partial:index.partial.html -->


<div class="container main-p my-5 p-md-5 p-3">
@if (session('status'))
    <div class="alert alert-success fade show">
      {{ session('status') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger fade show">
      {{ session('error') }}
    </div>
@endif
  <div class="texts my-4">
    <h3>Book our family vacation house for this weekend</h3>
  </div>
  <hr>
<div class="row">
  <div class="col-lg-6">
    <div id="datepicker"></div>
  </div>
  <div class="col-lg-6">
    <div class="maindiv">
  <table class="table ">
    <h6>Current Bookings</h6>
    <thead>
      <tr>
       
        <th>Check In</th>
        <th>Check Out</th>
        <th>Name</th>
        <th>Desc</th>
      </tr>
      <tbody>
        @foreach ($booking as $book)
        <tr>
          <td>{{date('d-m-Y',strtotime($book['checkin']))}}</td>
          <td>{{date('d-m-Y',strtotime($book['checkout']))}}</td>
          <td>{{$book['name']}}</td>
          <td>{{$book['description']}}</td>
        </tr>
        @endforeach
      </tbody>
    </thead>
  </table>
</div>
</div>
</div>
<form action="{{url('booked')}}" method="POST">
@csrf
  <div class="cal">
    <input type="text" id="dates" placeholder="Check In - Check Out"  readonly/>
    <input type="text" id="checkin" name="checkin" placeholder="Check In" value="{{old('checkin')}}" readonly/>
    <input type="text" id="checkout" name="checkout" placeholder="Check Out" value="{{old('checkout')}}" readonly/>
   
  </div> 
  <span class="text-danger">
    @error('checkin') {{ $message }} @enderror
  </span>
  <span class="text-danger">
    @error('checkout') {{ $message }} @enderror
  </span>
  <div class="row my-3">
    <div class="col-md-7">
      <label>Name</label>
      <br>
      <input type="text"  name="name" class="form-control" placeholder="Enter Your Name" value="{{old('name')}}"/>
      <span class="text-danger">
        @error('name') {{ $message }} @enderror
      </span>
    </div>
  </div>

  <div class="row my-3">
    <div class="col-md-7">
      <label>Description</label>
      <br>
      <textarea cols="20" rows="2" name="description"  maxlength="50"  class="form-control" placeholder="Description...">{{old('description')}}</textarea>
      <span class="text-danger">
        @error('description') {{ $message }} @enderror
      </span>
    </div>
  </div>

  <button class="btn btn-success" type="submit">Submit</button>
</form>
</div>





<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 

<script>
  var globalarray = {};
</script>

@foreach ($booking as $book)
<script>
  var checkin =  '{{$book['checkin']}}';
  var checkout = '{{$book['checkout']}}';
  var dates = dateRange(checkin, checkout);

 console.log(dates);

 for (let i = 0; i < dates.length; i++) {
    for(let j=0 ; j<dates[i].length;j++){
      // highlightDate[ new Date(dates[i])] = new Date(dates[i]);
      globalarray[ new Date(dates[i])] = new Date(dates[i]);
      
    }
}
console.log('globalarray2--',globalarray);

 function dateRange(checkin, checkout, steps = 1) {
  var dateArray = [];
  let currentDate = new Date(checkin);

  while (currentDate <= new Date(checkout)) {
    dateArray.push(currentDate.toLocaleDateString('en-US')); // Format date as mm/dd/yyyy
    currentDate.setUTCDate(currentDate.getUTCDate() + steps);
  }

  return dateArray;

}
</script>
@endforeach

<script>
  console.log('checkdates',dates);
  $(function(){
  var startDate, endDate;
  var datepicker = {
        container: $("#datepicker"),
        dateFormat: 'yy-mm-dd',
        dates: [null,null],
       // dates: ['{{$book['checkin']}}','{{$book['checkout']}}'],
        status: null,
        inputs: {
            checkin: $('#checkin'),
            checkout: $('#checkout'),
            dates: $('#dates')
        }
    };
  // var highlightDate = {};
 
 
// console.log(highlightDate);
console.log('globalarray',globalarray);
  //highlightDate[ new Date('{{$checkin['checkin']}}')] = new Date('{{$checkin['checkin']}}');
  //highlightDate[ new Date('{{$checkout['checkout']}}')] = new Date('{{$checkout['checkout']}}');
//console.log(highlightDate);



datepicker.container.datepicker({
  numberOfMonths: 2,
  dateFormat: datepicker.dateFormat,
  minDate: 0,
  maxDate: null,


  beforeShowDay: function(date) {
    var highlight = false,
        currentTime = date.getTime(),
        selectedTime = datepicker.dates,
        checkin_date = selectedTime[0] ? new Date(selectedTime[0]) : null,
        checkout_date = selectedTime[1] ? new Date(selectedTime[1]) : null,
        checkin_timestamp,
        checkout_timestamp,
        classes = 'ui-datepicker-highlight';


        var highlight = globalarray[date];
          if( highlight ) {
            console.log('highlight',highlight);   
              return [true, "eventClass", 'Booked'];
          } else {
            console.log('highlight2',highlight);   
              return [true, '', ''];
          }
         
    date.setHours(0);
    date.setMinutes(0);
    date.setSeconds(0);
    date.setMilliseconds(0);

    currentTime = date.getTime();
    
    // CHECKIN/CHECKOUT CLASSES
     if(checkin_date) {
       checkin_date.setHours(0);
       checkin_date.setMinutes(0);
       checkin_date.setSeconds(0);
       checkin_date.setMilliseconds(0);
       checkin_timestamp = checkin_date.getTime();

       startDate = checkin_timestamp;
     }

    if(checkout_date) {
      checkout_date.setHours(0);
      checkout_date.setMinutes(0);
      checkout_date.setSeconds(0);
      checkout_date.setMilliseconds(0);
      checkout_timestamp = checkout_date.getTime();

      endDate = checkout_timestamp;
    }

    if ( checkin_timestamp && currentTime == checkin_timestamp ) {
      classes = 'ui-datepicker-highlight ui-checkin';
    } else if (checkout_timestamp && currentTime == checkout_timestamp) {
      classes = 'ui-datepicker-highlight ui-checkout';
    }
   
 
  
     
    // Highlight date range
    //  if( datepicker.dates){
    //   highlight = true;
    //   highlight.classes = 'danger';
    //  }

    if ((selectedTime[0] && selectedTime[0] == currentTime) || (selectedTime[1] && (currentTime >= selectedTime[0] && currentTime <= selectedTime[1]))) highlight = true;

    return [true, highlight ? classes : ""];
  },
  onSelect: function(dateText) {

    if (!datepicker.dates[0] || datepicker.dates[1] !== null) {
      // CHOOSE FIRST DATE
      
      // fill dates array with first chosen date
      datepicker.dates[0] = $.datepicker.parseDate(datepicker.dateFormat, dateText).getTime();
      datepicker.dates[1] = null;
      
      // clear all inputs
	    datepicker.inputs.checkin.val('');
      datepicker.inputs.checkout.val('');
	    datepicker.inputs.dates.val('');
      
      // set current datepicker state
      datepicker.status = 'checkin-selected';
      
      // create mouseover for table cell
      $('#datepicker').delegate('.ui-datepicker td', 'mouseover', function(){
        
        // if it doesn't have year data (old month or unselectable date)
        if ($(this).data('year') == undefined) return;
        
        // datepicker state is not in date range select, depart date wasn't chosen, or return date already chosen then exit
        if (datepicker.status != 'checkin-selected') return;
        
        // get date from hovered cell
        var hoverDate = $(this).data('year')+'-'+($(this).data('month')+1)+'-'+$('a',this).html();
        
        // parse hovered date into milliseconds
        hoverDate = $.datepicker.parseDate('yy-mm-dd', hoverDate).getTime();
        
        $('#datepicker td').each(function(){
          
          // compare each table cell if it's date is in date range between selected date and hovered
          if ($(this).data('year') == undefined) return;
          
          var year = $(this).data('year'),
              month = $(this).data('month'),
              day = $('a', this).html();
            
          var cellDate = $(this).data('year')+'-'+($(this).data('month')+1)+'-'+$('a',this).html();
          
          // convert cell date into milliseconds for further comparison
          cellDate = $.datepicker.parseDate('yy-mm-dd', cellDate).getTime();

          if ( (cellDate >= datepicker.dates[0] && cellDate <= hoverDate) || (cellDate <= datepicker.dates[0] && cellDate >= hoverDate) ) {
              $(this).addClass('ui-datepicker-hover');
            } else {
              $(this).removeClass('ui-datepicker-hover');
            }

        });
      });

  } else {
    // CHOOSE SECOND DATE
    
    // push second date into dates array
    datepicker.dates[1] = $.datepicker.parseDate(datepicker.dateFormat, dateText).getTime();
    
    // sort array dates
	  datepicker.dates.sort();

    var checkInDate = $.datepicker.parseDate('@', datepicker.dates[0]);
    var checkOutDate = $.datepicker.parseDate('@', datepicker.dates[1]);
    
    datepicker.status = 'checkout-selected';
	            
//fill input fields
   datepicker.inputs.checkin.val($.datepicker.formatDate(datepicker.dateFormat, checkInDate));
	            datepicker.inputs.checkout.val($.datepicker.formatDate(datepicker.dateFormat, checkOutDate)).change();
	            datepicker.inputs.dates.val(datepicker.inputs.checkin.val() + ' - ' + datepicker.inputs.checkout.val());

            }
        }
    });
});
</script>


</body>
</html>
