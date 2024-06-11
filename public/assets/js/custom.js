$(document).ready(function () {
    updateLoginLogoutDisplay();

    // Updates the display of the "Login" or "Logout" links based on localStorage
    function updateLoginLogoutDisplay() {
        var isLoggedIn = localStorage.getItem("isLoggedIn");

        if (isLoggedIn === "true") {
            $("a[href='login.html']:contains('Login')").hide();
            $("a[href='login.html']:contains('Logout')").show();
            $("#cart-nav").show();

        } else {
            $("a[href='login.html']:contains('Login')").show();
            $("a[href='login.html']:contains('Logout')").hide();
            $("#cart-nav").hide();
        }
    }

    // Handle the click on "Logout"
    $("a[href='login.html']:contains('Logout')").click(function (e) {
        e.preventDefault(); // Prevent default action
        localStorage.removeItem("isLoggedIn");
        window.location.href = "login.html"; // Redirect to home page after logout or some other page if you want.
    });


});
