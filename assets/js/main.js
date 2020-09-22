//using jquery
//when submitting the form with class js-register
$(document).on("submit","form.js-register",function(e){
  e.preventDefault()

  //select the error div with the form
  var error=$(".js-error",form)
  //define avariable with the form element
  var form=$(this)

  //create an object
  var data={
    //search for any input with type email in the form element only and gets it value
    email:$("input[type='email']",form).val(),
    //same here
    password:$("input[type='password']",form).val()
  }

  if(data.email.length<6){
    error.text("Please Enter avalid Email address").show()
    
    return false
  }
  //if the email is ok check the password
  else if(data.password.length<11)
  { 
    error.text("Please Enter avalid Password that is at least 11 char long").show()
    
    return false
  }
  //if everything is ok hide the eroor msg
  error.hide(2000)

  $.ajax({
    //the secure way 
    type:'POST',
    /*the continue page*/
    url:'ajax/register.php',
    /*the object with name and apassword*/
    data:data,
    dateType:'json',
    //dont stop the code if you still working
    async:true
  })
  .done(
    //when everything is fine
    function ajaxDone(data){
      console.log(data)
      //data is the return array  we got   from that page
      //if its defined direct me to that path 
      //if(data.redirect!==undefined)
      //window.location=data.redirect
      
    }
  )
  .fail(
    //if something goes wrong
    //e is the error
    function ajaxFailed(e){console.log(e)}
  )
  .always(
    //will always excuted
    function ajaxAlways(data){console.log('Always')})
  return false;
})