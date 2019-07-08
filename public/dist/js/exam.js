var startTime = Number(Date.now());
var stop = false;
var current;
let timerId2;
var time;
function startTimer(){
   current = Date.now() ;
   if(current - startTime >= 7000){
     stop = true;
   }
   time= current-startTime;
   checkTime();
}

function updateUI(value){
 //  let actualSec = value/1000;
 //  let sec = actualSec.slice(0,1);
 //  let nanSec = actualSec.slice(1,3);
   $('#timer-value').text(Number(value/1000).toFixed(2));
   $('#left').css({
     width: (value/1000/7)*100 + '%'
   });
}

function checkTime(){
 updateUI(time);
   if(stop == true){
     clearInterval(timerId2);
     submitAnswer();
   }
}

 function initiateTimer(){
   timerId2=setInterval(startTimer,100);
 }

 function submitAnswer() {
   $('#submit-answer').hide();
  
   $.ajax({
           url:'/quiz/' + $('#quiz-id').val() + '/next',
           type:'POST',
           headers: {
               'X-CSRF-TOKEN': $('#csrf').val()
           },
           data: {
               answer: $('input[name="answer"]').length == 0 ?  $('#answer').val() : $('input[name=answer]:checked').val()
           },
           success:function(data){
               $('#submit-answer').show();
               if(data.status == 'done'){
                   window.location.href = '/quiz/result/' + $('#quiz-id').val();
               } else {
                   $('#exam-space').html(data);
                   startTime = Date.now();
                   stop = false;
                   clearTimeout(timerId2);
                   initiateTimer();
               }
           },
           error: function (data) {
               startTime = Date.now();
               stop = false;
               clearTimeout(timerId2);
               initiateTimer();
               $('#submit-answer').show();
               toastr.error("An error occured while submitting answer! please try again.");
           }
       });
}


$(function () {
'use strict'
initiateTimer();
$(document).on('click', '#submit-answer', submitAnswer)
})