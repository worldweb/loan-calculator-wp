var PostSettingsTab  =  (evt, Fieldname) => {
    var i, tabcontent, nav_tab;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    document.getElementById('activeTabInput').value = Fieldname;

    nav_tab = document.getElementsByClassName("nav_tab");
    for (i = 0; i < nav_tab.length; i++) {
        nav_tab[i].classList.remove("active");
    }

    var targetElement = document.getElementById(Fieldname);

    if (targetElement) {
        targetElement.style.display = "block";
        if (evt) {
            evt.currentTarget.classList.add("active");
        }
    } else {
        console.error("Element with ID '" + Fieldname + "' not found.");
    }
}