@extends('layouts.main')

{{HTML::script('media/jquery-1.8.0.min.js') }}



<style>
#imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    background-image:url("{{asset('/public/uploads/employees/photo/default_photo.png') }}");
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
#signPreview {
    width: 180px;
    height: 100px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    background-image:url("{{asset('/public/uploads/employees/signature/sign_av.jpg') }}");
    display: inline-block;
}
</style>

 <style>

#ncontainer table{border-collapse:collapse;border-radius:25px;width:500px;}
table, td, th{border:1px solid #00BB64;}
#ncontainer input[type=checkbox]{height:30px;width:10px;border:1px solid #fff;}
tr,#ncontainer input,#ncontainer textarea,#fdate,#edate{height:30px;width:150px;border:1px solid #fff;}
#ncontainer textarea{height:50px; width:150px;border:1px solid #fff;}
#dcontainer #fdate,#edate{height:30px; width:180px;border:1px solid #fff;background: #EEE}
#ncontainer input:focus,#dcontainer input#fdate:focus,#dcontainer input#edate:focus,#ncontainer textarea:focus{border:1px solid yellow;} 
.space{margin-bottom: 2px;}
#ncontainer{margin-left:0px;}
.but{width:270px;background:#00BB64;border:1px solid #00BB64;height:40px;border-radius:3px;color:white;margin-top:10px;margin:0px 0px 0px 290px;}
</style>

  <style>

#dcontainer table{border-collapse:collapse;border-radius:25px;width:500px;}
table, td, th{border:1px solid #00BB64;}
#dcontainer input[type=checkbox]{height:30px;width:10px;border:1px solid #fff;}
tr,#dcontainer input,#dcontainer textarea{height:30px;width:180px;border:1px solid #fff;}\
#f{width:200px;}
#dcontainer textarea{height:50px; width:100px;border:1px solid #fff;}
#dcontainer input:focus,#dcontainer input:focus{border:1px solid yellow;} 
.space{margin-bottom: 2px;}
#dcontainer{margin-left:0px;}
.but{width:270px;background:#00BB64;border:1px solid #00BB64;height:40px;border-radius:3px;color:white;margin-top:10px;margin:0px 0px 0px 290px;}
</style>

  <style>
    label, input#cname, input#ename { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em;}
    .validateTips, .validateTips1, .validateTips2, .validateTips3, .validateTips4, .validateTips5, .validateTips6, .validateTips7, .validateTips8{ border: 1px solid transparent; padding: 0.3em; }
    .ui-dialog 
    {
    position: fixed;
    margin-bottom: 850px;
    }


    .ui-dialog-titlebar-close {
  background: url("{{ URL::asset('jquery-ui-1.11.4.custom/images/ui-icons_888888_256x240.png'); }}") repeat scroll -93px -128px rgba(0, 0, 0, 0);
  border: medium none;
}
.ui-dialog-titlebar-close:hover {
  background: url("{{ URL::asset('jquery-ui-1.11.4.custom/images/ui-icons_222222_256x240.png'); }}") repeat scroll -93px -128px rgba(0, 0, 0, 0);
}
    
  </style>

<script type="text/javascript">
$(document).ready(function() {
  $("#sub-form").prop('disabled',true);
  $("#lname").keyup(function(){
  if($("#lname").val() == ""){
    $("#lnamestatus").html("<div style='color: red;'> Please insert  surname!</div>");
    $("#sub-form").prop('disabled',true);
  }
  });

  $("#fname").keyup(function(){
  if($("#fname").val() == ""){
    $("#fnamestatus").html("<div style='color: red;'> Please insert first name!</div>");
    $("#sub-form").prop('disabled',true);
  }
  });

  $("#identity_number").keyup(function(){
  if($("#identity_number").val() == ""){
    $("#identity_number").html("<div style='color: red;'> Please insert employee identity number!</div>");
    $("#sub-form").prop('disabled',true);
  }else{
    var idno = $("#identity_number").val();
    var field = "idno";

    // check username name only if length is greater than or equal to 3
    
      $("#idstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if identity number exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {idno: idno,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#idstatus").html(data);
      });
  }
  });

  $("#passport_number").keyup(function(){
  
    var passport = $("#passport_number").val();
    var field = "passport";

    // check username name only if length is greater than or equal to 3
    
      $("#passportstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if passport number exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {passport: passport,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#passportstatus").html(data);
      });
  
  });


  $("#pin").keyup(function(){
  
    var pin = $("#pin").val();
    var field = "pin";

    // check username name only if length is greater than or equal to 3
    
      $("#pinstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if kra pin exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {pin: pin,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#pinstatus").html(data);
      });
  
  });

  $("#hospital_insurance_number").keyup(function(){
  
    var nhif = $("#hospital_insurance_number").val();
    var field = "nhif";

    // check username name only if length is greater than or equal to 3
    
      $("#nhifstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if nhif number exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {nhif: nhif,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#nhifstatus").html(data);
      });
  
  });

  $("#social_security_number").keyup(function(){
  
    var nssf = $("#social_security_number").val();
    var field = "nssf";

    // check username name only if length is greater than or equal to 3
    
      $("#nssfstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if nssf number exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {nssf: nssf,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#nssfstatus").html(data);
      });
  
  });

  $("#bank_account_number").keyup(function(){
  
    var acc = $("#bank_account_number").val();
    var field = "acc";

    // check username name only if length is greater than or equal to 3
    
      $("#accstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if bank account number exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {acc: acc,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#accstatus").html(data);
      });
  
  });

  $("#bank_eft_code").keyup(function(){
  
    var eft = $("#bank_eft_code").val();
    var field = "eft";

    // check username name only if length is greater than or equal to 3
    
      $("#eftstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if eft code exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {eft: eft,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#eftstatus").html(data);
      });
  
  });

  $("#swift_code").keyup(function(){
  
    var swift = $("#swift_code").val();
    var field = "swift";

    // check username name only if length is greater than or equal to 3
    
      $("#swiftstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if swift code exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {swift: swift,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#swiftstatus").html(data);
      });
  
  });

  $("#work_permit_number").keyup(function(){
  
    var permit = $("#work_permit_number").val();
    var field = "permit";

    // check username name only if length is greater than or equal to 3
    
      $("#permitstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if work permit number exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {permit: permit,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#permitstatus").html(data);
      });
  
  });


  $("#telephone_mobile").keyup(function(){
  
    var phone = $("#telephone_mobile").val();
    var field = "phone";

    // check username name only if length is greater than or equal to 3
    
      $("#phonestatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if phone number exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {phone: phone,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#phonestatus").html(data);
      });
  
  });

  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  $("#email_office").keyup(function(){

    if($('#email_office').val() == "" || re.test($('#email_office').val()) == false){
        $('#eostatus').html("<div style='color: red;'>Please insert a valid email address!</div>");
        $("#sub-form").prop('disabled',true);
        }else{
  
    var emailoffice = $("#email_office").val();
    var field = "emailoffice";

    // check username name only if length is greater than or equal to 3
    
      $("#eostatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if office email number exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {emailoffice: emailoffice,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#eostatus").html(data);
      });
    }
  
  });

  $("#email_personal").keyup(function(){

    if(re.test($('#email_personal').val()) == false && $('#email_personal').val() != ""){
        $('#epstatus').html("<div style='color: red;'>Please insert a valid email address!</div>");
        $("#sub-form").prop('disabled',true);
        }else if($('#email_personal').val() == ""){
        $('#epstatus').html("");
        } else{
  
    var emailpersonal = $("#email_personal").val();
    var field = "emailpersonal";

    // check username name only if length is greater than or equal to 3
    
      $("#epstatus").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking if personal email exists...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {emailpersonal: emailpersonal,field:field}, function(data, status){
          $("#sub-form").prop('disabled',true);
          $("#epstatus").html(data);
      });
    }
  
  });

/*
  $("#fname").keyup(function(){
    //console.log($("#fname").val());
    // get text username text field value 
    var fname = $("#fname").val();

    // check username name only if length is greater than or equal to 3
    
      $("#status").html('<img src="{{ URL::to("images/loader.gif"); }}" /> Checking availability...');
      // check username 
      $.post("{{URL::to('employee/validate')}}", {fname: fname}, function(data, status){
          $("#status").html(data);
      });
    
  });*/

  $('#grossform').submit(function(event){
        event.preventDefault();
       $.ajax({
                      url     : "{{URL::to('employee/shownet')}}",
                      type    : "POST",
                      dataType: "JSON",
                      async   : false,
                      data    : {
                              'formdata'  : $('#grossform').serialize()
                      }      
       }).done(function(data) {
            //alert(data.gross1);
            $('#salary').val(data.salary);
            $('#gross').val(data.gross);
            $('#totaldeductions').val(data.deductions);
            $('#totalallowances').val(data.allowances);
            $('#tded').val(data.totaldeductions);
            $('#paye').val(data.paye);
            $('#nssf').val(data.nssf);
            $('#nhif').val(data.nhif);
            $('#net').val(data.net);
        });
     });
  /*$('#gross').keypress(function(event){
     var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
      var gross = $(this).val();

       displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('shownet')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'gross'  : gross
                      },
                      success : function(s){
                      
                      }        
       });
       }
    }
    });
*/

      var net = $('#net1').val();

      // displaygross(); 

      
       $('#netform').submit(function(event){
        event.preventDefault();
       $.ajax({
                      url     : "{{URL::to('employee/showgross')}}",
                      type    : "POST",
                      dataType: "JSON",
                      async   : false,
                      data    : {
                              'formdata'  : $('#netform').serialize()
                      }      
       }).done(function(data) {
            //alert(data);
            $('#netsalary').val(data.salary1);
            $('#gross1').val(data.gross1);
            $('#paye1').val(data.paye1);
            $('#nssf1').val(data.nssf1);
            $('#nhif1').val(data.nhif1);
            $('#netded').val(data.netded);
            $('#net1').val(data.netv);
        });
     });

    $('#contract').hide();

    $('#newmode').hide();

    $("#modep").on("change", function()
    {
    if($(this).val() == 'Others'){
        $('#newmode').show();
    }else{
        $('#newmode').hide();
        $('#omode').val('');
    }
    });

    $("#type_id").on("change", function()
    {
    if($(this).val() == 2){
        $('#contract').show();
    }else{
        $('#contract').hide();
        $('#startdate').val('');
        $('#enddate').val('');
    }
    });

    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });

    $('#bank_id').change(function(){
        $.get("{{ url('api/dropdown')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#bbranch_id').empty(); 
            $('#bbranch_id').append("<option>----------------select Bank Branch--------------------</option>");
            $('#bbranch_id').append("<option value='cnew'>Create New</option>");
            $.each(data, function(key, element) {
            $('#bbranch_id').append("<option value='" + key +"'>" + element + "</option>");
            });
        });
    });
});
</script>


<script type="text/javascript">
$(document).ready(function() {
    $("#signFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#signPreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

@section('content')
<br/>


<div class="row">
  <div class="col-lg-12">

    
  {{ HTML::style('jquery-ui-1.11.4.custom/jquery-ui.css') }}
  {{ HTML::script('jquery-ui-1.11.4.custom/jquery-ui.js') }}

  <script type="text/javascript">
  $(document).ready(function(){
    
      $('#empdetails').click(function(e){
        e.preventDefault();

        /*var kdata = $('.kindata').map(function(){
          return this.value;
        }).get();*/

        var kind= $('.kindata').serialize();

        var docdata = new FormData($("#form3"));

        //var docdata= $('.docdata').serialize();

        /*var kfn = $('input[name^="kin_first_name"]').map(function(){
          return this.value;
        }).get();

        var kln = $('input[name^="kin_last_name"]').map(function(){
          return this.value;
        }).get();

        var kmn = $('input[name^="kin_middle_name"]').map(function(){
          return this.value;
        }).get();

        var kid = $('input[name^="id_number"]').map(function(){
          return this.value;
        }).get();

        var krel = $('input[name^="relationship"]').map(function(){
          return this.value;
        }).get();

        var kcon = $('input[name^="contact"]').map(function(){
          return this.value;
        }).get();*/

        /*var path = $('input[name^="path"]').map(function(){
          return this.value;
        }).get();

        var name = $('input[name^="doc_name"]').map(function(){
          return this.value;
        }).get();

        var desc = $('input[name^="description"]').map(function(){
          return this.value;
        }).get();

        var fdate = $('input[name^="fdate"]').map(function(){
          return this.value;
        }).get();

        var edate = $('input[name^="edate"]').map(function(){
          return this.value;
        }).get();

        var __data = $('input[name^="kin_first_name"]').serialize();*/


        var fname = $( "#fname" ),
            lname = $( "#lname" ),
            identity_number = $( "#identity_number" ),
            dob = $( "#dob" ),
            gender = $( ".gen" ),
            jgroup = $( "#jgroup_id" ),
            type = $( "#type_id" ), 
            pay = $( "#pay" ),
            djoined = $( "#djoined" ),
            email_office = $( "#email_office" ),
            email_personal = $( "#email_personal" ),
            allFields = $( [] ).add( fname ).add( lname ).add( identity_number ).add( dob ).add( gender ).add( jgroup ).add( type ).add( pay ).add( djoined ).add( email_office ).add( email_personal ),
            tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o,m) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( m );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }

    var valid = true;
      allFields.removeClass( "ui-state-error" );

      /*valid = valid && checkLength( lname, "Please insert last name!" );
 
      valid = valid && checkLength( fname, "Please insert first name!" );

      valid = valid && checkLength( identity_number, "Please insert employee`s identity number!" );

      valid = valid && checkLength( dob, "Please insert employee`s date of birth!" );

      valid = valid && checkLength( gender, "Please select gender!" );

      valid = valid && checkLength( jgroup, "Please select employee`s job group!" );

      valid = valid && checkLength( type, "Please select employee`s type!" );

      valid = valid && checkLength( djoined, "Please insert date employee joined company!" );

      valid = valid && checkLength( email_office, "Please insert employee`s office email address!" );

      valid = valid && checkRegexp( lname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for last name!" );

      valid = valid && checkRegexp( fname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for first name!" );

      valid = valid && checkRegexp( email_office, /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/, "Please insert a valid office email address!" );

      valid = valid && checkRegexp( email_personal, /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/, "Please insert a valid personal email address!" );
*/
      
 
     

        
            //get form id
             $.ajax({
                      url     : "{{URL::to('createEmployee')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                                 'personal_file_number':$('#personal_file_number').val(),
                                 'image' :$('#uploadFile').val(),
                                 'signature' :$('#signFile').val(),
                                 'fname' :$('#fname').val(),
                                 'lname' :$('#lname').val(),
                                 'mname' :$('#mname').val(),
                                 'identity_number' :$('#identity_number').val(),
                                 'passport_number' :$('#passport_number').val(),
                                 'dob' :$('#dob').val(),
                                 'status' :$('#status').val(),
                                 'citizenship' :$('#citizenship').val(),
                                 'education' :$('#education').val(),
                                 'gender' :$('#gender').val(),
                                 'pin' :$('#pin').val(),
                                 'social_security_number' :$('#social_security_number').val(),
                                 'hospital_insurance_number' :$('#hospital_insurance_number').val(),
                                 'i_tax' :$('#itax').val(),
                                 'i_tax_relief' :$('#irel').val(),
                                 'a_nssf' :$('#a_nssf').val(),
                                 'a_nhif' :$('#a_nhif').val(),
                                 'modep' :$('#modep').val(),
                                 'omode' :$('#omode').val(),
                                 'bank_id' :$('#bank_id').val(),
                                 'bbranch_id' :$('#bbranch_id').val(),
                                 'bank_account_number' :$('#bank_account_number').val(),
                                 'bank_eft_code' :$('#bank_eft_code').val(),
                                 'swift_code' :$('#swift_code').val(),
                                 'branch_id' :$('#branch_id').val(),
                                 'department_id' :$('#department_id').val(),
                                 'jgroup_id' :$('#jgroup_id').val(),
                                 'type_id' :$('#type_id').val(),
                                 'startdate' :$('#startdate').val(),
                                 'enddate' :$('#enddate').val(),
                                 'work_permit_number' :$('#work_permit_number').val(),
                                 'jtitle' :$('#jtitle').val(),
                                 'pay' :$('#pay').val(),
                                 'djoined' :$('#djoined').val(),
                                 'telephone_mobile' :$('#telephone_mobile').val(),
                                 'email_office' :$('#email_office').val(),
                                 'email_personal' :$('#email_personal').val(),
                                 'zip' :$('#zip').val(),
                                 'address' :$('#address').val(),
                                 'ch' :$('#active').val(),
                                 'kindata':kind,
                                 'docinfo':docdata
                               },
                      success : function(s){
                        alert(s);
                      }        
        });
        
        });
            //this function will create loop for all forms in page
           
  });
  </script>

 

  <script>
  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      cname = $( "#cname" ),
      
      allFields = $( [] ).add( cname ),
      tips = $( ".validateTips1" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( "Please insert citizenship name!" );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( cname );
 
      valid = valid && checkRegexp( cname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for citizenship." );
 
      if ( valid ) {

      /* displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('reloaddata')}}",
                      type    : "POST",
                      async   : false,
                      data    : { },
                      success : function(s){
                        var data = JSON.parse(s)
                        //alert(data.id);
                      }        
       });
       }*/

        $.ajax({
            url     : "{{URL::to('createCitizenship')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'name'  : cname.val()
                      },
                      success : function(s){
                         $('#citizenship').append($('<option>', {
                         value: s,
                         text: cname.val(),
                         selected:true
                         }));
                      }        
        });
        
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 250,
      width: 350,
      modal: true,
      buttons: {
        "Create": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $('#citizenship').change(function(){
    if($(this).val() == "cnew"){
    dialog.dialog( "open" );
    }
      
    });
  });
  </script>

  <script>
  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      ename = $( "#ename" ),
      
      allFields = $( [] ).add( ename ),
      tips = $( ".validateTips2" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( "Please insert education level!" );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( ename );
 
      valid = valid && checkRegexp( ename, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for education level." );
 
      if ( valid ) {

      /* displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('reloaddata')}}",
                      type    : "POST",
                      async   : false,
                      data    : { },
                      success : function(s){
                        var data = JSON.parse(s)
                        //alert(data.id);
                      }        
       });
       }*/

        $.ajax({
            url     : "{{URL::to('createEducation')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'name'  : ename.val()
                      },
                      success : function(s){
                         $('#education').append($('<option>', {
                         value: s,
                         text: ename.val(),
                         selected:true
                         }));
                      }        
        });
        
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 250,
      width: 350,
      modal: true,
      buttons: {
        "Create": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $('#education').change(function(){
    if($(this).val() == "cnew"){
    dialog.dialog( "open" );
    }
      
    });
  });
  </script>


<script>
  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      bname = $( "#bname" ),
      bcode = $( "#bcode" ),
      allFields = $( [] ).add( bname ).add( bcode ),
      tips = $( ".validateTips3" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( "Please insert bank name!" );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( bname );
 
      valid = valid && checkRegexp( bname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for bank name." );
 
      if ( valid ) {

      /* displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('reloaddata')}}",
                      type    : "POST",
                      async   : false,
                      data    : { },
                      success : function(s){
                        var data = JSON.parse(s)
                        //alert(data.id);
                      }        
       });
       }*/

        $.ajax({
            url     : "{{URL::to('createBank')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'name'  : bname.val(),
                              'code'  : bcode.val()
                      },
                      success : function(s){
                         $('#bank_id').append($('<option>', {
                         value: s,
                         text: bname.val(),
                         selected:true
                         }));

                         $("#bid").val($("#bank_id").val());
      
            $('#bbranch_id').empty(); 
            $('#bbranch_id').append("<option>----------------select Bank Branch--------------------</option>");
            $('#bbranch_id').append("<option value='cnew'>Create New</option>");
            
            }        
        });
        
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 350,
      width: 350,
      modal: true,
      buttons: {
        "Create": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $('#bank_id').change(function(){
    if($(this).val() == "cnew"){
    dialog.dialog( "open" );
    }
      
    });
  });
  </script>


  <script>
  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      bname = $( "#bname" ),
      bcode = $( "#bcode" ),
      bid   = $( "#bid" ),
      allFields = $( [] ).add( bname ).add( bcode ).add( bid ),
      tips = $( ".validateTips4" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o,m) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( m );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( bname, "Please insert bank branch name!" );

      //valid = valid && checkLength( bid, "Please select bank for this branch!" );
 
      valid = valid && checkRegexp( bname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for bank branch name." );
 
      if ( valid ) {

      /* displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('reloaddata')}}",
                      type    : "POST",
                      async   : false,
                      data    : { },
                      success : function(s){
                        var data = JSON.parse(s)
                        //alert(data.id);
                      }        
       });
       }*/

        $.ajax({
            url     : "{{URL::to('createBankBranch')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'name'  : bname.val(),
                              'code'  : bcode.val(),
                              'bid'   : bid.val()
                      },
                      success : function(s){
                         $('#bbranch_id').append($('<option>', {
                         value: s,
                         text: bname.val(),
                         selected:true
                         }));
                      }        
        });
        
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 350,
      width: 350,
      modal: true,
      buttons: {
        "Create": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $('#bbranch_id').change(function(){
    if($(this).val() == "cnew"){
    $("#bid").val($("#bank_id").val());
    dialog.dialog( "open" );
    }
      
    });

  });
  </script>
  
  <script>
  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      bname = $( "#bname" ),
      allFields = $( [] ).add( bname ),
      tips = $( ".validateTips5" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o,m) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( m );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( bname, "Please insert branch name!" );

      //valid = valid && checkLength( bid, "Please select bank for this branch!" );
 
      valid = valid && checkRegexp( bname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for branch name." );
 
      if ( valid ) {

      /* displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('reloaddata')}}",
                      type    : "POST",
                      async   : false,
                      data    : { },
                      success : function(s){
                        var data = JSON.parse(s)
                        //alert(data.id);
                      }        
       });
       }*/

        $.ajax({
            url     : "{{URL::to('createBranch')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'name'  : bname.val()
                      },
                      success : function(s){
                         $('#branch_id').append($('<option>', {
                         value: s,
                         text: bname.val(),
                         selected:true
                         }));
                      }        
        });
        
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 280,
      width: 350,
      modal: true,
      buttons: {
        "Create": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $('#branch_id').change(function(){
    if($(this).val() == "cnew"){
    dialog.dialog( "open" );
    }
      
    });

  });
  </script>

  <script>
  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      dname = $( "#dname" ),
      allFields = $( [] ).add( dname ),
      tips = $( ".validateTips6" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o,m) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( m );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( dname, "Please insert department name!" );

      //valid = valid && checkLength( bid, "Please select bank for this branch!" );
 
      valid = valid && checkRegexp( dname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for department name." );
 
      if ( valid ) {

      /* displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('reloaddata')}}",
                      type    : "POST",
                      async   : false,
                      data    : { },
                      success : function(s){
                        var data = JSON.parse(s)
                        //alert(data.id);
                      }        
       });
       }*/

        $.ajax({
            url     : "{{URL::to('createDepartment')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'name'  : dname.val()
                      },
                      success : function(s){
                         $('#department_id').append($('<option>', {
                         value: s,
                         text: dname.val(),
                         selected:true
                         }));
                      }        
        });
        
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 280,
      width: 350,
      modal: true,
      buttons: {
        "Create": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $('#department_id').change(function(){
    if($(this).val() == "cnew"){
    dialog.dialog( "open" );
    }
      
    });

  });
  </script>
 
 
  <script>
  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      jname = $( "#jname" ),
      allFields = $( [] ).add( jname ),
      tips = $( ".validateTips7" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o,m) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( m );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( jname, "Please insert job group!" );

      //valid = valid && checkLength( bid, "Please select bank for this branch!" );
 
      valid = valid && checkRegexp( jname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for job group." );
 
      if ( valid ) {

      /* displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('reloaddata')}}",
                      type    : "POST",
                      async   : false,
                      data    : { },
                      success : function(s){
                        var data = JSON.parse(s)
                        //alert(data.id);
                      }        
       });
       }*/

        $.ajax({
            url     : "{{URL::to('createGroup')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'name'  : jname.val()
                      },
                      success : function(s){
                         $('#jgroup_id').append($('<option>', {
                         value: s,
                         text: jname.val(),
                         selected:true
                         }));
                      }        
        });
        
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 280,
      width: 350,
      modal: true,
      buttons: {
        "Create": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $('#jgroup_id').change(function(){
    if($(this).val() == "cnew"){
    dialog.dialog( "open" );
    }
      
    });

  });
  </script>
   
    <script>
  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      tname = $( "#tname" ),
      allFields = $( [] ).add( tname ),
      tips = $( ".validateTips8" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o,m) {
      if ( o.val().length == 0 ) {
        o.addClass( "ui-state-error" );
        updateTips( m );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( tname, "Please insert employee type name!" );

      //valid = valid && checkLength( bid, "Please select bank for this branch!" );
 
      valid = valid && checkRegexp( tname, /^[a-z]([0-9a-z_\s])+$/i, "Please insert a valid name for employee type name." );
 
      if ( valid ) {

      /* displaydata(); 

      function displaydata(){
       $.ajax({
                      url     : "{{URL::to('reloaddata')}}",
                      type    : "POST",
                      async   : false,
                      data    : { },
                      success : function(s){
                        var data = JSON.parse(s)
                        //alert(data.id);
                      }        
       });
       }*/

        $.ajax({
            url     : "{{URL::to('createType')}}",
                      type    : "POST",
                      async   : false,
                      data    : {
                              'name'  : tname.val()
                      },
                      success : function(s){
                         $('#type_id').append($('<option>', {
                         value: s,
                         text: tname.val(),
                         selected:true
                         }));
                      }        
        });
        
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 280,
      width: 350,
      modal: true,
      buttons: {
        "Create": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $('#type_id').change(function(){
    if($(this).val() == "cnew"){
    dialog.dialog( "open" );
    }
      
    });

  });
  </script>

   

<div id="dialog-form" title="Create new citizenship name">
  <p class="validateTips1">Please insert citizenship name.</p>
 
  <form>
    <fieldset>
      <label for="name">Name <span style="color:red">*</span></label>
      <input type="text" name="cname" id="cname" value="" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title="Create new education level">
  <p class="validateTips2">Please insert education level.</p>
 
  <form>
    <fieldset>
      <label for="name">Name <span style="color:red">*</span></label>
      <input type="text" name="ename" id="ename" value="" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title="Create new bank">
  <p class="validateTips3">Please insert bank name.</p>
 
  <form>
    <fieldset>
      <label for="name">Name <span style="color:red">*</span></label>
      <input type="text" name="bname" id="bname" value="" class="text ui-widget-content ui-corner-all">

      <label for="name">Code</label>
      <input type="text" name="bcode" id="bcode" value="" class="text ui-widget-content ui-corner-all">

      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title="Create new bank branch">
  <p class="validateTips4">Please fill fields in *.</p>
 
  <form>
    <fieldset>
      <label for="name">Name <span style="color:red">*</span></label>
      <input type="text" name="bname" id="bname" value="" class="text ui-widget-content ui-corner-all">

      <label for="name">Code</label>
      <input type="text" name="bcode" id="bcode" value="" class="text ui-widget-content ui-corner-all">

      <input type="hidden" name="bid" id="bid" value="" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title="Create new branch">
  <p class="validateTips5">Please insert branch.</p>
 
  <form>
    <fieldset>
      <label for="name">Name <span style="color:red">*</span></label>
      <input type="text" name="bname" id="bname" value="" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title="Create new department">
  <p class="validateTips6">Please insert department.</p>
 
  <form>
    <fieldset>
      <label for="name">Name <span style="color:red">*</span></label>
      <input type="text" name="dname" id="dname" value="" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title="Create new job group">
  <p class="validateTips7">Please insert job group.</p>
 
  <form>
    <fieldset>
      <label for="name">Name <span style="color:red">*</span></label>
      <input type="text" name="jname" id="jname" value="" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<div id="dialog-form" title="Create new employee type">
  <p class="validateTips8">Please insert employee type.</p>
 
  <form>
    <fieldset>
      <label for="name">Name <span style="color:red">*</span></label>
      <input type="text" name="tname" id="tname" value="" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

     
 <form method="POST" action="{{{ URL::to('employees') }}}" accept-charset="UTF-8" enctype="multipart/form-data">

  <div class="row">
  <div class="col-lg-12">
  <h3>New Employee <button style="margin-left:620px" type="submit" id="sub-form" class="btn btn-primary btn-sm">Create Employee</button></h3>

<hr>
</div>  
</div>

@if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#personalinfo" aria-controls="personalinfo" role="tab" data-toggle="tab">Personal Info</a></li>
    <li role="presentation"><a href="#pininfo" aria-controls="pininfo" role="tab" data-toggle="tab">Government Info</a></li>
    <li role="presentation"><a href="#payment" aria-controls="payment" role="tab" data-toggle="tab">Payment Info</a></li>
    <li role="presentation"><a href="#companyinfo" aria-controls="companyinfo" role="tab" data-toggle="tab">Company Info</a></li>
    <li role="presentation"><a href="#contactinfo" aria-controls="contactinfo" role="tab" data-toggle="tab">Contact Info</a></li>
    <li role="presentation"><a href="#kins" aria-controls="kins" role="tab" data-toggle="tab">Next of Kin</a></li>
    <li role="presentation"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Documents</a></li>
    <li role="presentation"><a href="#calculator" aria-controls="calculator" role="tab" data-toggle="tab">Payroll Calculator</a></li>
    </ul>

  <!-- Tab panes -->
  <div class="tab-content">    

<div role="tabpanel" class="tab-pane active" id="personalinfo">
  <br><br>
            
            <div class="col-lg-4">

                    <div class="form-group">
                        <label for="username">Personal File Number <span style="color:red">*</span></label>
                        <input class="form-control" readonly placeholder="" type="text" name="personal_file_number" id="personal_file_number" value="{{(int)($pfn->personal_file_number)+1}}" >
                    </div>

                    <div class="form-group">
                        <label for="username">Photo</label><br>
                        <div id="imagePreview"></div>
                        <input class="img" placeholder="" type="file" name="image" id="uploadFile" value="{{{ Input::old('image') }}}">
                    </div>
            
                     <div class="form-group">
                        <label for="username">Signature</label><br>
                        <div id="signPreview"></div>
                        <input class="img" placeholder="" type="file" name="signature" id="signFile" value="{{{ Input::old('signature') }}}">
                    </div>

                  </div>

                    <div class="col-lg-4">


                    <div class="form-group">
                        <label for="username">Surname <span style="color:red">*</span></label>
                        <input class="form-control" placeholder="" type="text" name="lname" id="lname" value="{{{ Input::old('lname') }}}">
                        <div id="lnamestatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">First Name <span style="color:red">*</span></label>
                        <input class="form-control" placeholder="" type="text" name="fname" id="fname" value="{{{ Input::old('fname') }}}">
                        <div id="fnamestatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Other Names </label>
                        <input class="form-control" placeholder="" type="text" name="mname" id="mname" value="{{{ Input::old('mname') }}}">
                    </div>

                    <div class="form-group">
                        <label for="username">ID Number <span style="color:red">*</span></label>
                        <input class="form-control" placeholder="" type="text" name="identity_number" id="identity_number" value="{{{ Input::old('identity_number') }}}">
                        <div id="idstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Passport number</label>
                        <input class="form-control" placeholder="" type="text" name="passport_number" id="passport_number" value="{{{ Input::old('passport_number') }}}">
                        <div id="passportstatus"></div>
                    </div>

                    </div>
                   
                   <div class="col-lg-4">

                    <div class="form-group">
                        <label for="username">Date of birth  <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input class="form-control datepicker1" readonly="readonly" placeholder="" type="text" name="dob" id="dob" value="{{{ Input::old('dob') }}}">
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Marital Status</label>
                        <select name="status" id="status" class="form-control">
                            <option></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Others">Others</option>
                        </select>
                
                    </div>

                    <div class="form-group">
                        <label for="username">Citizenship</label>
                        <select name="citizenship" id="citizenship" class="form-control">
                            <option></option>
                            <option value="cnew">Create New</option>
                             @foreach($citizenships as $citizenship)
                            <option value="{{ $citizenship->id }}"> {{ $citizenship->name }}</option>
                            @endforeach
                        </select>
                
                    </div>
                    
                    <div class="form-group">
                        <label for="username">Education Background</label>
                        <select name="education" id="education" class="form-control">
                            <option></option>
                            <option value="cnew">Create New</option>
                            @foreach($educations as $education)
                            <option value="{{ $education->id }}"> {{ $education->education_name }}</option>
                            @endforeach

                        </select>
                
                    </div>


                    <div class="form-group">
                        <label for="username">Gender  <span style="color:red">*</span></label>
                        <input class="gen"  type="radio" name="gender" id="gender" value="male"> Male
                        <input class="gen"  type="radio" name="gender" id="gender" value="female"> Female
                    </div>

                    </div>

          </div>

        <div role="tabpanel" class="tab-pane" id="pininfo">
            <br><br>
            <div class="col-lg-4">
                    <div class="form-group"><h3 style='color:Green;strong'>Pin Information</h3></div>
                    <div class="form-group">
                        <label for="username">KRA Pin</label>
                        <input class="form-control" placeholder="" type="text" name="pin" id="pin" value="{{{ Input::old('pin') }}}">
                        <div id="pinstatus"></div>
                    </div>

                     <div class="form-group">
                        <label for="username">Nssf Number</label>
                        <input class="form-control" placeholder="" type="text" name="social_security_number" id="social_security_number" value="{{{ Input::old('social_security_number') }}}">
                        <div id="nssfstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Nhif Number</label>
                        <input class="form-control" placeholder="" type="text" name="hospital_insurance_number" id="hospital_insurance_number" value="{{{ Input::old('hospital_insurance_number') }}}">
                        <div id="nhifstatus"></div>
                    </div>
                     </div>

                     <div class="col-lg-4">
                      
                      <div class="form-group"><h3 style='color:Green;strong;'>Deductions Applicable</h3></div>

                        <div class="checkbox">
                        <label>
                            <input type="checkbox" checked name="i_tax" id="itax">
                              Apply Income Tax
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked name="i_tax_relief" id="irel">
                               Apply Income Tax Relief
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked name="a_nssf" id="a_nssf">
                               Apply Nssf
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked name="a_nhif" id="a_nhif">
                                Apply Nhif
                        </label>
                    </div>
                   </div>
                 </div>

                     <div role="tabpanel" class="tab-pane" id="payment">
                      <br><br>
                       <div class="col-lg-4">
              
                    <div class="form-group">
                        <label for="username">Mode of Payment</label>
                        <select name="modep" id="modep" class="form-control">
                            <option></option>
                            <option value="Bank">Bank</option>
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Others">Others</option>
                        </select>
                
                    </div> 

                    <div class="form-group" id="newmode">
                        <label for="username">Insert Mode of Payment</label>
                        <input class="form-control" placeholder="" type="text" name="omode" id="omode" value="{{{ Input::old('omode') }}}">
                    </div>               

                    <div class="form-group">
                        <label for="username">Bank</label>
                        <select name="bank_id" id="bank_id" class="form-control">
                            <option></option>
                            <option value="cnew">Create New</option>
                            @foreach($banks as $bank)
                            <option value="{{ $bank->id }}"> {{ $bank->bank_name }}</option>
                            @endforeach

                        </select>
                
                    </div>

                      
                     <div class="form-group">
                        <label for="username">Bank Branch</label>
                        <select name="bbranch_id" id="bbranch_id" class="form-control">
                            <option></option>
                        </select>
                
                    </div>

                    </div>

                    <div class="col-lg-4">
                    <div class="form-group">
                        <label for="username">Bank Account Number</label>
                        <input class="form-control" placeholder="" type="text" name="bank_account_number" id="bank_account_number" value="{{{ Input::old('bank_account_number') }}}">
                        <div id="accstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Bank Eft Code</label>
                        <input class="form-control" placeholder="" type="text" name="bank_eft_code" id="bank_eft_code" value="{{{ Input::old('bank_eft_code') }}}">
                        <div id="eftstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Swift Code</label>
                        <input class="form-control" placeholder="" type="text" name="swift_code" id="swift_code" value="{{{ Input::old('swift_code') }}}">
                        <div id="swiftstatus"></div>
                    </div>
                     

              </div>

            </div>

          <div role="tabpanel" class="tab-pane" id="companyinfo">
            <br><br>
            <div class="col-lg-4">
                    <div class="form-group">
                        <label for="username">Employee Branch </label>
                        <select name="branch_id" id="branch_id" class="form-control">
                            <option></option>
                            <option value="cnew">Create New</option>
                            @foreach($branches as $branch)
                            <option value="{{ $branch->id }}"> {{ $branch->name }}</option>
                            @endforeach

                        </select>
                
                    </div>


                     <div class="form-group">
                        <label for="username">Employee Department </label>
                        <select name="department_id" id="department_id" class="form-control">
                            <option></option>
                            <option value="cnew">Create New</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id }}"> {{ $department->department_name }}</option>
                            @endforeach

                        </select>
                
                    </div>

                     <div class="form-group">
                        <label for="username">Job Group  <span style="color:red">*</span></label>
                        <select name="jgroup_id" id="jgroup_id" class="form-control">
                            <option></option>
                            <option value="cnew">Create New</option>
                            @foreach($jgroups as $jgroup)
                            <option value="{{ $jgroup->id }}"> {{ $jgroup->job_group_name }}</option>
                            @endforeach

                        </select>
                
                    </div>


                     <div class="form-group">
                        <label for="username">Employee Type  <span style="color:red">*</span></label>
                        <select name="type_id" id="type_id" class="form-control">
                            <option></option>
                            <option value="cnew">Create New</option>
                            @foreach($etypes as $etype)
                            <option value="{{$etype->id }}"> {{ $etype->employee_type_name }}</option>
                            @endforeach

                        </select>
                
                    </div>

                    <div id="contract">

                    <div class="form-group">
                        <label for="username">Start Date <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input class="form-control expiry" readonly="readonly" placeholder="" type="text" name="startdate" id="startdate" value="{{{ Input::old('startdate') }}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username">End Date <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input class="form-control expiry" readonly="readonly" placeholder="" type="text" name="enddate" id="enddate" value="{{{ Input::old('enddate') }}}">
                        </div>
                     </div>

                 </div>

               </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label for="username">Work Permit Number</label>
                        <input class="form-control" placeholder="" type="text" name="work_permit_number" id="work_permit_number" value="{{{ Input::old('work_permit_number') }}}">
                        <div id="permitstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Job Title</label>
                        <input class="form-control" placeholder="" type="text" name="jtitle" id="jtitle" value="{{{ Input::old('jtitle') }}}">
                    </div>

                    <div class="form-group">
            
                        <label for="username">Basic Salary  <span style="color:red">*</span></label>
                        <div class="input-group">
                        <span class="input-group-addon">{{$currency->shortname}}</span>
                        <input class="form-control" placeholder="" type="text" name="pay" id="pay" value="{{{ Input::old('pay') }}}">
                       </div>
                    </div>

                    <div class="form-group">
                        <label for="username">Date joined  <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input class="form-control datepicker"  readonly="readonly" placeholder=""  type="text" name="djoined" id="djoined" value="{{{ Input::old('djoined') }}}">
                        </div>
                        </div>

                        </div>

                        <div class="col-lg-4">

                        <div class="form-group">
                        <label for="username">Assign Supervisor</label>
                        <select name="supervisor" id="supervisor" class="form-control">
                            <option></option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"> {{ $employee->first_name.' '.$employee->last_name }}</option>
                            @endforeach

                        </select>
                
                    </div>

                  <div class="checkbox">
                        <label>
                            <input id="ch" type="checkbox" checked name="active">
                                In Employment
                        </label>
                    </div>
                 </div>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="contactinfo">
                        <br>
                        <div class="col-lg-6">
                    <div class="form-group">
                        <label for="username">Phone Number</label>
                        <input class="form-control" placeholder="" type="text" name="telephone_mobile" id="telephone_mobile" value="{{{ Input::old('telephone_mobile') }}}">
                        <div id="phonestatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Office Email <span style="color:red">*</span></label>
                        <input class="form-control" placeholder="" type="text" name="email_office" id="email_office" value="{{{ Input::old('email_office') }}}">
                        <div id="eostatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Personal Email</label>
                        <input class="form-control" placeholder="" type="text" name="email_personal" id="email_personal" value="{{{ Input::old('email_personal') }}}">
                        <div id="epstatus"></div>
                    </div>

                    <div class="form-group">
                        <label for="username">Postal Zip</label>
                        <input class="form-control" placeholder="" type="text" name="zip" id="zip" value="{{{ Input::old('zip') }}}">
                    </div>

                     <div class="form-group">
                        <label for="username">Postal Address</label>
                        <textarea class="form-control"  name="address" id="address">{{{ Input::old('address') }}}</textarea>
                    </div>

                  </div>

                 </div>


<div role="tabpanel" class="tab-pane" id="kins">

<h4 align="center"><strong>Next of Kin</strong></h4>
<div id='ncontainer'>

<table id="nextkin" border="1" cellspacing="0">
  <tr>
    <th><input class='ncheck_all' type='checkbox' onclick="select_all()"/></th>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Other Names</th>
    <th>ID Number</th>
    <th>Relationship</th>
    <th>Contact</th>
  </tr>
  <tr>
    <td><input type='checkbox' class='ncase'/></td>
    <td><span id='nsnum'>1.</span></td>
    <td><input class="kindata" type='text' id='first_name' name='kin_first_name[0]' value="{{{ Input::old('kin_first_name[0]') }}}"/></td>
    <td><input class="kindata" type='text' id='last_name' name='kin_last_name[0]' value="{{{ Input::old('kin_last_name[0]') }}}"/></td>
    <td><input class="kindata" type='text' id='middle_name' name='kin_middle_name[0]' value="{{{ Input::old('kin_middle_name[0]') }}}"/></td>
    <td><input class="kindata" type='text' id='id_number' name='id_number[0]' value="{{{ Input::old('id_number[0]') }}}"/> </td>
    <td><input class="kindata" type='text' id='relationship' name='relationship[0]' value="{{{ Input::old('relationship[0]') }}}"/></td>
    <td><textarea class="kindata" name="contact[0]" id="contact">{{{ Input::old('contact[0]') }}}</textarea></td>
  </tr>
</table>

<button type="button" class='ndelete'>- Delete</button>
<button type="button" class='naddmore'>+ Add More</button>
</div>
<script>
$(".ndelete").on('click', function() {
  if($('.ncase:checkbox:checked').length > 0){
  if (window.confirm("Are you sure you want to delete this employee kin detail(s)?"))
      {
  $('.ncase:checkbox:checked').parents("#nextkin tr").remove();
    $('.ncheck_all').prop("checked", false); 
  check();
}else{
  $('.ncheck_all').prop("checked", false); 
  $('.ncase').prop("checked", false); 
}
}
});
var i=2;
$(".naddmore").on('click',function(){
  count=$('#nextkin tr').length;
    var data="<tr><td><input type='checkbox' class='ncase'/></td><td><span id='nsnum"+i+"'>"+count+".</span></td>";
    data +="<td><input class='kindata' type='text' id='first_name"+i+"' name='kin_first_name["+(i-1)+"]' value='{{{ Input::old('kin_first_name["+(i-1)+"]') }}}'/></td><td><input class='kindata' type='text' id='last_name"+i+"' name='kin_last_name["+(i-1)+"]' value='{{{ Input::old('kin_last_name["+(i-1)+"]') }}}'/></td><td><input class='kindata' type='text' id='middle_name"+i+"' name='kin_middle_name["+(i-1)+"]' value='{{{ Input::old('kin_middle_name["+(i-1)+"]') }}}'/></td><td><input class='kindata' type='text' id='id_number"+i+"' name='id_number["+(i-1)+"]' value='{{{ Input::old('id_number["+(i-1)+"]') }}}'/></td><td><input class='kindata' type='text' id='relationship"+i+"' name='relationship["+(i-1)+"]' value='{{{ Input::old('relationship["+(i-1)+"]') }}}'/></td><td><textarea class='kindata' name='contact["+(i-1)+"]' id='contact"+i+"'>{{{ Input::old('contact["+(i-1)+"]') }}}</textarea></td>";
  $('#nextkin').append(data);
  i++;
});

function select_all() {
  $('input[class=ncase]:checkbox').each(function(){ 
    if($('input[class=ncheck_all]:checkbox:checked').length == 0){ 
      $(this).prop("checked", false); 
    } else {
      $(this).prop("checked", true); 
    } 
  });
}

function check(){
  obj=$('#nextkin tr').find('span');
  $.each( obj, function( key, value ) {
  id=value.id;
  $('#'+id).html(key+1);
  });
  }

</script>

</form>

</div>


<div role="tabpanel" class="tab-pane" id="documents">

<h4 align="center"><strong>Employee Documents</strong></h4>
<div id='dcontainer'>

<table id="docEmp" width="500" border="1" cellspacing="0">
    <tr>
    <th><input class='dcheck_all' type='checkbox' onclick="dselect_all()"/></th>
    <th>#</th>
    <th width="200">Document</th>
    <th>Name</th>
    <th>Description</th>
    <th>Date From</th>
    <th>End Date</th>
    </tr>
    <tr>
    <td><input type='checkbox' class='dcase'/></td>
    <td><span id='dsnum'>1.</span></td>
    <td id="f"><input class="docdata" type="file" name="path[0]" id="path" value="{{{ Input::old('path[0]') }}}"></td>
    <td><input class="docdata" type='text' id='doc_name' name='doc_name[0]' value="{{{ Input::old('doc_name[0]') }}}"/></td>
    <td><textarea class="docdata" style="width:150px" name="description[0]" id="description">{{{ Input::old('description[0]') }}}</textarea></td>
    <td><div class="right-inner-addon">
        <i class="glyphicon glyphicon-calendar"></i>
        <input class="form-control expiry" readonly="readonly" placeholder="" type="text" name="fdate[0]" id="fdate" value="">
        </div>
    </td>
    <td><div class="right-inner-addon">
        <i class="glyphicon glyphicon-calendar"></i>
        <input class="form-control expiry" readonly="readonly" placeholder="" type="text" name="edate[0]" id="edate" value="">
        </div>
    </td>
  </tr>
</table>

<button type="button" class='ddelete'>- Delete</button>
<button type="button" class='daddmore'>+ Add More</button>
 
  
</div>

{{ HTML::script('datepicker/js/bootstrap-datepicker.min.js') }}

<script type="text/javascript">
$(function(){ 

$('body').on('focus',"input.expiry",function(){
  $(this).datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-60y',
    autoclose: true
});
});
});
</script>

<script>
$(".ddelete").on('click', function() {
  if($('.dcase:checkbox:checked').length > 0){
  if (window.confirm("Are you sure you want to delete this document detail(s)?"))
      {
  $('.dcase:checkbox:checked').parents("#docEmp tr").remove();
    $('.dcheck_all').prop("checked", false); 
  dcheck();
}else{
  $('.dcheck_all').prop("checked", false); 
  $('.dcase').prop("checked", false); 
}
}
});
var j=2;
$(".daddmore").on('click',function(){
  count=$('#docEmp tr').length;
    var data="<tr><td><input type='checkbox' class='dcase'/></td><td><span id='dsnum"+j+"'>"+count+".</span></td>";
    data +="<td id='f'><input class='docdata' type='file' id='path"+j+"' name='path["+(j-1)+"]' value='{{{ Input::old('path["+(j-1)+"]') }}}'/></td><td><input class='docdata' type='text' id='doc_name"+j+"' name='doc_name["+(j-1)+"]' value='{{{ Input::old('doc_name["+(j-1)+"]') }}}'/></td><td><textarea class='docdata' name='description["+(j-1)+"]' id='description"+j+"'>{{{ Input::old('description["+(j-1)+"]') }}}</textarea></td><td><div class='right-inner-addon'><i class='glyphicon glyphicon-calendar'></i><input class='form-control expiry' readonly='readonly' placeholder='' type='text' name='fdate["+(j-1)+"]' id='fdate"+j+"' value='{{{ Input::old('fdate["+(j-1)+"]') }}}'></div></td><td><div class='right-inner-addon'><i class='glyphicon glyphicon-calendar'></i><input class='form-control expiry' readonly='readonly' placeholder='' type='text' name='edate["+(j-1)+"]' id='edate"+j+"' value='{{{ Input::old('edate["+(j-1)+"]') }}}'></div></td>";
  $('#docEmp').append(data);
  j++;
});

function dselect_all() {
  $('input[class=dcase]:checkbox').each(function(){ 
    if($('input[class=dcheck_all]:checkbox:checked').length == 0){ 
      $(this).prop("checked", false); 
    } else {
      $(this).prop("checked", true); 
    } 
  });
}

function dcheck(){
  obj=$('#docEmp tr').find('span');
  $.each( obj, function( key, value ) {
  id=value.id;
  $('#'+id).html(key+1);
  });
  }

</script>
                      
                    

</div>


 <div role="tabpanel" class="tab-pane" id="calculator">
            <br><br>
            <div class="col-lg-6">
             <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#grosstonet" aria-controls="grosstonet" role="tab" data-toggle="tab">Gross to Net</a></li>
    <li role="presentation"><a href="#nettogross" aria-controls="nettogross" role="tab" data-toggle="tab">Net to Gross</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  

  <div role="tabpanel" class="tab-pane active" id="grosstonet" class="displayrecord">
    <form id="grossform" accept-charset="UTF-8">
    <fieldset>

      <?php
       $a = str_replace( ',', '', Input::get('gross'));
       $s = str_replace( ',', '', Input::get('salary'));
       $alw = str_replace( ',', '', Input::get('totalallowances'));
       $d = str_replace( ',', '', Input::get('totaldeductions'));
       $t = str_replace( ',', '', Input::get('tded'));
      ?>

       <div class="form-group">
        <label for="username">Basic Pay:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($s == null || $s == '')
        <input class="form-control" placeholder="" type="text" name="salary" id="salary" value="0.00">
        @else
        <input class="form-control" placeholder="" type="text" name="salary" id="salary" value="{{asMoney($s)}}">
        @endif
       </div>
       </div>                    
   
      <?php
      $i=0;
      ?>

       @foreach($allowances as $allowance)
       <div class="form-group">
        <label for="username">{{$allowance->allowance_name}}:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($a == null || $a == '')
        <input class="form-control" placeholder="" type="text" name="allowance[]" id="allowance$i" value="0.00">
        @else
        <input class="form-control" placeholder="" type="text" name="allowance[]" id="allowance$i" value="{{asMoney($a)}}">
        @endif
       </div>
       </div>
       <?php $i++;?>
       @endforeach

       <div class="form-group">
        <label for="username">Gross Pay:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($a == null || $a == '')
        <input class="form-control" readonly placeholder="" type="text" name="gross" id="gross" value="0.00">
        @else
        <input class="form-control" readonly placeholder="" type="text" name="gross" id="gross" value="{{asMoney($a)}}">
        @endif
       </div>
       </div>

       @foreach($deductions as $deduction)
       <div class="form-group">
        <label for="username">{{$deduction->deduction_name}}:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($a == null || $a == '')
        <input class="form-control" placeholder="" type="text" name="deduction[]" id="deduction$i" value="0.00">
        @else
        <input class="form-control" placeholder="" type="text" name="deduction[]" id="deduction$i" value="{{asMoney($a)}}">
        @endif
       </div>
       </div>
       <?php $i++;?>
       @endforeach

       @if($alw == null || $alw == '')
       <input class="form-control" placeholder="" type="hidden" name="totalallowances" id="totalallowances" value="0.00">
       @else
       <input class="form-control" placeholder="" type="hidden" name="totalallowances" id="totalallowances" value="{{asMoney($alw)}}">
       @endif

       @if($d == null || $d == '')
       <input class="form-control" placeholder="" type="hidden" name="totaldeductions" id="totaldeductions" value="0.00">
       @else
       <input class="form-control" placeholder="" type="hidden" name="totaldeductions" id="totaldeductions" value="{{asMoney($d)}}">
       @endif

        <div class="form-group">
        <label for="username">Paye:</label>
        <div class="input-group">
            <span class="input-group-addon">{{$currency->shortname}}</span>
         <input readonly class="form-control" placeholder="" type="text" name="paye" id="paye" value="{{ Payroll::asMoney(Payroll::payecalc($a))}}">
        </div>

        <div class="form-group insts" id="insts">
            <label for="username">NSSF: </label>
            <div class="input-group">
            <span class="input-group-addon">{{$currency->shortname}}</span>
            <input readonly class="form-control" placeholder="" type="text" name="nssf" id="nssf" value="{{Payroll::asMoney(Payroll::nssfcalc($a))}}">
        </div>
      </div>

        <div class="form-group">
            <label for="username">NHIF: <span style="color:red">*</span> </label>
            <div class="input-group">
            <span class="input-group-addon">{{$currency->shortname}}</span>
            <input readonly class="form-control" placeholder="" type="text" name="nhif" id="nhif" value="{{Payroll::asMoney(Payroll::nhifcalc($a))}}">
           </div>
        </div>

        <div class="form-group">
        <label for="username">Total Deductions:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($t == null || $t == '')
        <input class="form-control" readonly placeholder="" type="text" name="tded" id="tded" value="0.00">
        @else
        <input class="form-control" readonly placeholder="" type="text" name="tded" id="tded" value="{{asMoney($t)}}">
        @endif
       </div>
       </div>
        
        <div class="form-group">
        <label for="username">Net:</label>
        <div class="input-group">
            <span class="input-group-addon">{{$currency->shortname}}</span>
         <input readonly class="form-control" placeholder="" type="text" name="net" id="net" value="{{Payroll::asMoney(Payroll::netcalc($a,$d))}}">
        </div>
      </div>

    </fieldset>

    <div align="right" style="margin-top:0px;display:none;" class="form-actions form-group">
        
          <button class="btn btn-primary btn-sm process" >Get Net</button>
        </div>

        </form>


</div>

 

<div role="tabpanel" class="tab-pane" id="nettogross">
  <form method="POST" id="netform" accept-charset="UTF-8">
    <fieldset>

       <?php
       $a = str_replace( ',', '', Input::get('net1'));
       $s = str_replace( ',', '', Input::get('salary'));
       $alw = str_replace( ',', '', Input::get('totalallowances'));
       $d = str_replace( ',', '', Input::get('totaldeductions'));
       $t = str_replace( ',', '', Input::get('tded'));
      ?>

      <div class="form-group">
        <label for="username">Basic Pay:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($s == null || $s == '')
        <input class="form-control" readonly placeholder="" type="text" name="netsalary" id="netsalary" value="0.00">
        @else
        <input class="form-control" readonly placeholder="" type="text" name="netsalary" id="netsalary" value="{{asMoney($s)}}">
        @endif
       </div>
       </div>                    
   
      <?php
      $i=0;
      ?>

       @foreach($allowances as $allowance)
       <div class="form-group">
        <label for="username">{{$allowance->allowance_name}}:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($a == null || $a == '')
        <input class="form-control" placeholder="" type="text" name="netallowance[]" id="netallowance$i" value="0.00">
        @else
        <input class="form-control" placeholder="" type="text" name="netallowance[]" id="netallowance$i" value="{{asMoney($a)}}">
        @endif
       </div>
       </div>
       <?php $i++;?>
       @endforeach


       <div class="form-group">
        <label for="username">Gross Pay:</label>
        <div class="input-group">
          <span class="input-group-addon">{{$currency->shortname}}</span>
         @if($a == null || $a == '')
        <input class="form-control" readonly placeholder="" type="text" name="gross1" id="gross1" value="0.00">
        @else
        <input class="form-control" readonly placeholder="" type="text" name="gross1" id="gross1" value="{{ asMoney($gross)}}">
        @endif
       </div>
       </div>  

       @foreach($deductions as $deduction)
       <div class="form-group">
        <label for="username">{{$deduction->deduction_name}}:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($a == null || $a == '')
        <input class="form-control" placeholder="" type="text" name="netdeduction[]" id="netdeduction$i" value="0.00">
        @else
        <input class="form-control" placeholder="" type="text" name="netdeduction[]" id="netdeduction$i" value="{{asMoney($a)}}">
        @endif
       </div>
       </div>
       <?php $i++;?>
       @endforeach                  

        <div class="form-group">
        <label for="username">Paye:</label>
        <div class="input-group">
            <span class="input-group-addon">{{$currency->shortname}}</span>
         @if($a == null || $a == '')
        <input readonly class="form-control" placeholder="" type="text" name="paye1" id="paye1" value="0.00">
        @else
         <input readonly class="form-control" placeholder="" type="text" name="paye1" id="paye1" value="{{ asMoney($paye1)}}">
         @endif
        </div>
      </div>

        <div class="form-group insts" id="insts">
            <label for="username">NSSF: </label>
            <div class="input-group">
            <span class="input-group-addon">{{$currency->shortname}}</span>
            @if($a == null || $a == '')
        <input readonly class="form-control" placeholder="" type="text" name="nssf1" id="nssf1" value="0.00">
        @else
            <input readonly class="form-control" placeholder="" type="text" name="nssf1" id="nssf1" value="{{asMoney($nssf1)}}">
             @endif
        </div>
      </div>

        <div class="form-group">
            <label for="username">NHIF: <span style="color:red">*</span> </label>
            <div class="input-group">
            <span class="input-group-addon">{{$currency->shortname}}</span>
            @if($a == null || $a == '')
        <input readonly class="form-control" placeholder="" type="text" name="nhif1" id="nhif1" value="0.00">
        @else
            <input readonly class="form-control" placeholder="" type="text" name="nhif1" id="nhif1" value="{{asMoney($nhif1)}}">
            @endif
        </div>
      </div>

      <div class="form-group">
        <label for="username">Total Deductions:</label>
        <div class="input-group">
        <span class="input-group-addon">{{$currency->shortname}}</span>
        @if($t == null || $t == '')
        <input class="form-control" readonly placeholder="" type="text" name="netded" id="netded" value="0.00">
        @else
        <input class="form-control" readonly placeholder="" type="text" name="netded" id="netded" value="{{asMoney($t)}}">
        @endif
       </div>
       </div>
        
        <div class="form-group">
        <label for="username">Net:</label>
        <div class="input-group">
            <span class="input-group-addon">{{$currency->shortname}}</span>
          @if($a == null || $a == '')
        <input class="form-control" placeholder="" type="text" name="net1" id="net1" value="0.00">
        @else
        <input class="form-control" placeholder="" type="text" name="net1" id="net1" value="{{asMoney($a)}}">
        @endif
       </div> 
        </div>
      </div>

    </fieldset>
    <div align="right" style="margin-top:0px;display:none;" class="form-actions form-group">
        
          <button class="btn btn-primary btn-sm process" >Get Gross</button>
        </div>

        </form>
</div>


  </div>

</div>
            </div>
            </div>


</div>

</form>


<script type="text/javascript">
$(document).ready(function() {
$("#itax").click(function(){
if($(this).is(':checked')){
 $("#irel").prop('checked', true);
}else{
$("#irel").prop('checked', false);
}
});
});
</script>

@stop