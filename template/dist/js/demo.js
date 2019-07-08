/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
  
 var startTime = Number(Date.now());
   var stop = false;
   var current;
   let timerId2;
   var time;
   function startTimer(){
      current = Date.now() ;
      if(current - startTime >= 7000){
        console.log('Time to Stop')
        stop = true;
      }
      time= current-startTime;
      // console.log(current-startTime);
      checkTime();
   }

   function updateUI(value){
    //  let actualSec = value/1000;
    //  let sec = actualSec.slice(0,1);
    //  let nanSec = actualSec.slice(1,3);
      $('#timer-value').text(value);
   }

   function checkTime(){
    updateUI(time);
      if(stop == true){
        clearInterval(timerId2);
      }
   }

    function initiateTimer(){
      timerId2=setInterval(startTimer,100);
    }

 

(function ($) {
  'use strict'
  initiateTimer();
  $(".avatar-select a").click(function() {
    $(this).next().prop("checked", "checked");
});

  $('.avatar-select a').click(function() {
        $('li:has(input:radio:checked)').addClass('active');
        $('li:has(input:radio:not(:checked))').removeClass('active');
    });


  // let testimonies = $('.carousel-inner .item')
  $('#copy_referal').click(copyReferal);

    function copyReferal(evt){
      evt.preventDefault();
      let $target = document.getElementById('referal_code');
      $target.select();
      document.execCommand("copy");
    }
    $('#testimonial4').carousel({
      interval: 4000,
      pause: true,
  });

  $('#deposit-proxy').on('click',(evt) => {
    evt.preventDefault();
    $('#deposit-trigger').click();
  })

  var $sidebar   = $('.control-sidebar')
  var $container = $('<div />', {
    class: 'p-3'
  })

  $sidebar.append($container)

  var navbar_dark_skins = [
    'bg-primary',
    'bg-info',
    'bg-success',
    'bg-danger'
  ]

  var navbar_light_skins = [
    'bg-warning',
    'bg-white',
    'bg-gray-light'
  ]

  $container.append(
    '<h5>Customize AdminLTE</h5><hr class="mb-2"/>'
    + '<h6>Navbar Variants</h6>'
  )

  var $navbar_variants        = $('<div />', {
    'class': 'd-flex'
  })
  var navbar_all_colors       = navbar_dark_skins.concat(navbar_light_skins)
  var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function (e) {
    var color = $(this).data('color')
    console.log('Adding ' + color)
    var $main_header = $('.main-header')
    $main_header.removeClass('navbar-dark').removeClass('navbar-light')
    navbar_all_colors.map(function (color) {
      $main_header.removeClass(color)
    })

    if (navbar_dark_skins.indexOf(color) > -1) {
      $main_header.addClass('navbar-dark')
      console.log('AND navbar-dark')
    } else {
      console.log('AND navbar-light')
      $main_header.addClass('navbar-light')
    }

    $main_header.addClass(color)
  })

  $navbar_variants.append($navbar_variants_colors)

  $container.append($navbar_variants)

  var $checkbox_container = $('<div />', {
    'class': 'mb-4'
  })
  var $navbar_border = $('<input />', {
    type   : 'checkbox',
    value  : 1,
    checked: $('.main-header').hasClass('border-bottom'),
    'class': 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-header').addClass('border-bottom')
    } else {
      $('.main-header').removeClass('border-bottom')
    }
  })
  $checkbox_container.append($navbar_border)
  $checkbox_container.append('<span>Navbar border</span>')
  $container.append($checkbox_container)


  var sidebar_colors = [
    'bg-primary',
    'bg-warning',
    'bg-info',
    'bg-danger',
    'bg-success'
  ]

  var sidebar_skins = [
    'sidebar-dark-primary',
    'sidebar-dark-warning',
    'sidebar-dark-info',
    'sidebar-dark-danger',
    'sidebar-dark-success',
    'sidebar-light-primary',
    'sidebar-light-warning',
    'sidebar-light-info',
    'sidebar-light-danger',
    'sidebar-light-success'
  ]

  $container.append('<h6>Dark Sidebar Variants</h6>')
  var $sidebar_variants = $('<div />', {
    'class': 'd-flex'
  })
  $container.append($sidebar_variants)
  $container.append(createSkinBlock(sidebar_colors, function () {
    var color         = $(this).data('color')
    var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '')
    var $sidebar      = $('.main-sidebar')
    sidebar_skins.map(function (skin) {
      $sidebar.removeClass(skin)
    })

    $sidebar.addClass(sidebar_class)
  }))

  $container.append('<h6>Light Sidebar Variants</h6>')
  var $sidebar_variants = $('<div />', {
    'class': 'd-flex'
  })
  $container.append($sidebar_variants)
  $container.append(createSkinBlock(sidebar_colors, function () {
    var color         = $(this).data('color')
    var sidebar_class = 'sidebar-light-' + color.replace('bg-', '')
    var $sidebar      = $('.main-sidebar')
    sidebar_skins.map(function (skin) {
      $sidebar.removeClass(skin)
    })

    $sidebar.addClass(sidebar_class)
  }))

  var logo_skins = navbar_all_colors
  $container.append('<h6>Brand Logo Variants</h6>')
  var $logo_variants = $('<div />', {
    'class': 'd-flex'
  })
  $container.append($logo_variants)
  var $clear_btn = $('<a />', {
    href: 'javascript:void(0)'
  }).text('clear').on('click', function () {
    var $logo = $('.brand-link')
    logo_skins.map(function (skin) {
      $logo.removeClass(skin)
    })
  })
  $container.append(createSkinBlock(logo_skins, function () {
    var color = $(this).data('color')
    var $logo = $('.brand-link')
    logo_skins.map(function (skin) {
      $logo.removeClass(skin)
    })
    $logo.addClass(color)
  }).append($clear_btn))

  function createSkinBlock(colors, callback) {
    var $block = $('<div />', {
      'class': 'd-flex flex-wrap mb-3'
    })

    colors.map(function (color) {
      var $color = $('<div />', {
        'class': (typeof color === 'object' ? color.join(' ') : color) + ' elevation-2'
      })

      $block.append($color)

      $color.data('color', color)

      $color.css({
        width       : '40px',
        height      : '20px',
        borderRadius: '25px',
        marginRight : 10,
        marginBottom: 10,
        opacity     : 0.8,
        cursor      : 'pointer'
      })

      $color.hover(function () {
        $(this).css({ opacity: 1 }).removeClass('elevation-2').addClass('elevation-4')
      }, function () {
        $(this).css({ opacity: 0.8 }).removeClass('elevation-4').addClass('elevation-2')
      })

      if (callback) {
        $color.on('click', callback)
      }
    })

    return $block
  }
})(jQuery)


// Select Questions JS 


$(function(){

  document.getElementById('proceed').disabled=true;
  
  $('.multiple').on('change',subjectSelected);
  $('.single').on('change',singleQuiz);



  
  //Select Exam JS 
  var proceed=false; var counter=0;
  
  function subjectSelected(evt){
      if(evt.target.classList.contains('special')){
          if(evt.target.checked==true){
              $('input[type="checkbox"]').each(function(){
                  this.disabled=true;
                  this.checked=false;
                  evt.target.disabled=false;
                  evt.target.checked=true;
                  proceed=true;
                  counter=3;
              });
          }
          else{
              $('input[type="checkbox"]').each(function(){
                  this.disabled=false;
              });
              proceed=false;
              counter=0;
          }
      }
      else{
          if(evt.target.checked==true){
              counter++;
              if (counter >= 3) {
                  $('input[type="checkbox"]').each(function(){
                      if(!this.checked) this.disabled=true;
                  });
              } 
          }else{
              --counter;
              proceed=false;
              $('input[type="checkbox"]').each(function(){
                 this.disabled=false;
              });
          }
      }


      if(counter==3) {
          proceed=true;
          // console.log('saoe');
          // console.log(toastr);
          toastr.info('You can proceed now!')
      }
      else proceed=false;
      
      if(proceed==true) document.getElementById('proceed').disabled=false;        
      else document.getElementById('proceed').disabled=true;        
  }


  function singleQuiz(evt){
    if(evt.target.classList.contains('special')){
        if(evt.target.checked==true){
            $('input[type="checkbox"]').each(function(){
                this.disabled=true;
                this.checked=false;
                evt.target.disabled=false;
                evt.target.checked=true;
                proceed=true;
                counter=1;
            });
        }
        else{
            $('input[type="checkbox"]').each(function(){
                this.disabled=false;
            });
            proceed=false;
            counter=0;
        }
    }
    else{
        if(evt.target.checked==true){
            counter++;
            if (counter >= 1) {
                $('input[type="checkbox"]').each(function(){
                    if(!this.checked) this.disabled=true;
                });
            } 
        }else{
            --counter;
            proceed=false;
            $('input[type="checkbox"]').each(function(){
               this.disabled=false;
            });
        }
    }


    if(counter==1) {
        proceed=true;
        toastr.info('You can proceed now!')
    }
    else proceed=false;
    
    if(proceed==true) document.getElementById('proceed').disabled=false;        
    else document.getElementById('proceed').disabled=true;        
}




  $(document).on('click', '#proceed', function () {
     $('#proceed').disabled = true;
  });

  
})

