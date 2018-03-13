
function ValidationForm(){ 
   
    
    var isValidForm = validateEmail()

    if(isValidForm){
        isValidForm = validatName();
        }
      
        return isValidForm;
    }

        function validateName()
        {   
            var password = $("#txt_password").val();
            var passwordlength=password.length;
            var alphaExp = /^[0-9a-zA-Z]+$/;
            if (password==""){
                    $('#err').text("All fields are mandatory *");
                    $('#txt_password').focus();
                    return false;
                   }
               else{
                   if ((passwordlength < 8))
                       { $('#err').text("minimum length of user password is 8");
                       $('#password').focus();
                       return false;
                       }

                    else{
                        if (alphaExp.test(password))  {
                            return true;
                            } 
                        else {
                                $('#err').text("only uppercase, lowercase and numbers are allowed in password field"); // This segment displays the validation rule for address.
                                $('#txt_password').focus();
                                return false;
                            }
                        }

                    }   
            return;
        }


            function validemail(email) {
                  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                  return re.test(email);
                }

            function validateEmail() {
				
				 var email = $("#txt_username").val();
				 if (email==""){
					 
                    $('#err').text("* All fields are required");
					$('#txt_password').focus();
                    return false;
                   }
				 else{
                  $("#err").text("");
                    if (validemail(email)) {
                    $("#txt_password").focus();
                    return true;
					} else {
                    $("#err").text(" Please Enter a valid Email !");
                    $("#err")
                        .css("color", "red")
                        .css("padding-left","20px");
                    $("#email").focus();
                      return false;
					}
					return ; 
					}
				}