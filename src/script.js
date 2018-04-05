
 var i =0;
function onSignIn(googleUser) {

  var profile = googleUser.getBasicProfile();
  document.getElementById("emailval").value=profile.getEmail();
  document.getElementById("nameval").value=profile.getName();

  $(".g-signin2").css("display","none");
  $(".data").css("display","block");
  $("#pic").attr('src',profile.getImageUrl());
  $("#name").text(profile.getName());
  $("#email").text(profile.getEmail());
  i=1;
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      alert("successfully logged out");
      $(".g-signin2").css("display","block");
      $(".data").css("display","none");
    });
  }

function signIN(){
	if(i==1)
	document.getElementById("signinform").submit();
}
