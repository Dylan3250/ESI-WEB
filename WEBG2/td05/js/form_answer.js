$(document).ready(function() {
    let name = new URL(location.href).searchParams.get("name");
    let role = new URL(location.href).searchParams.get("role");

    $("#welcome").text(`Bonjour ${role} ${name} !`);
});