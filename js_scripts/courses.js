window.onload = function() {
    var announcements = document.getElementById("announcements-button");
    announcements.onclick = function() {
        changeMainViewport(announcements.value);
    };

    var modules = document.getElementById("modules-button");
    modules.onclick = function() {
        changeMainViewport(modules.value);
    };

    var people = document.getElementById("people-button");
    people.onclick = function() {
        changeMainViewport(people.value);
    };

    var grades = document.getElementById("grades-button");
    grades.onclick = function() {
        changeMainViewport(grades.value);
    };
    return false;
}

function changeMainViewport(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 || xmlhttp.status == 200) {
            document.getElementById("content").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "php_scripts/student_courses_viewport.php?q=" + str, true);
    xmlhttp.send();
}    