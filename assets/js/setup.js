
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
    
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    document.getElementById("form-submit").style.display = "none";
    document.getElementById("nextBtn").style.display = "inline";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
    document.getElementById("nextBtn").style.display = "inline";
  }

  
  if (n == (x.length - 1)) {
    document.getElementById("form-submit").style.display = "inline";
    document.getElementById("nextBtn").style.display = "none";
  } else {
    document.getElementById("form-submit").style.display = "none";
    document.getElementById("nextBtn").innerHTML = "Next  <i class='fa fa-angle-double-right'></i>";
  }
  
  //... and run a function that will display the correct step indicator:
  stepIndicator(n)
  topIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  
  // Hide the current tab:
  x[currentTab].style.display = "none";
  
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    return false;
  }

  // Otherwise, display the correct tab:
  showTab(currentTab);

  
}



function validateForm() {
    
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");

  $(y).each(function(){
     if($(this).val()=="" && $(this).prop('required')){
        $(this).addClass('invalid');
        if($(this).attr('id')=="uploaded_img"){
          $('.up_user_img').addClass('invalid');
        }
          valid = false;
      }
  });

  
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status

  
}

function stepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function topIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("indicator");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
