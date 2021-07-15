function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.disconnect();
    console.log(googleUser.getAuthResponse())
    var token = googleUser.getAuthResponse().id_token
    console.log(token)
    $.ajax({
        url: '../libraries/Controller/googleOauthConnexion.php',
        dateType: 'json',
        type: 'POST',
        data: { token: token }

    }).done(function (data) {
        console.log(data);
        window.location.replace("profil.php");

    })
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
    $.ajax({
        url: 'deconnexion.php',
        dateType: 'json',
        type: 'POST',

    }).done(function (data) {
        console.log(data);
        location.reload();

    })
}
