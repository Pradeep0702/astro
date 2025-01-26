$('.file').dropify({
    imgFileExtensions: ['png', 'jpg', 'jpeg','webp']
});
document.addEventListener("DOMContentLoaded", function() {
    var dropdownBtn = document.getElementById("dropdownBtn");
    var dropdownContent = document.getElementById("dropdownContent");
    
    if(dropdownBtn){
            dropdownBtn.addEventListener("click", function() {
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
                dropdownContent.classList.add("fadeIn");
            }
            });
     }
  
    document.addEventListener("click", function(event) {
      if (!dropdownBtn.contains(event.target) && !dropdownContent.contains(event.target)) {
        dropdownContent.style.display = "none";
      }
    });
  });


$(window).on('load', function () {        
    $(".preloader-container").fadeOut("slow", function () {
    $(this).removeClass("d-flex");
   });
});
var accItem = document.getElementsByClassName('accordionItem');
var accHD = document.getElementsByClassName('accordionItemHeading');
for (i = 0; i < accHD.length; i++) {
    accHD[i].addEventListener('click', toggleItem, false);
}

function toggleItem() {
    var itemClass = this.parentNode.className;

    for (i = 0; i < accItem.length; i++) {
        accItem[i].className = 'accordionItem closeIt';
    }
    if (itemClass == 'accordionItem closeIt') {
        this.parentNode.className = 'accordionItem openIt';
    }
}


var ts1 = document.getElementById('sidebarToggle');
if (ts1) {
    ts1.addEventListener("click", toggleSidebar);
}

function toggleSidebar() {
    let toggle = document.querySelector('body');
    toggle.classList.toggle('sidebar-toggled');
}

window.addEventListener("resize", resiz);

function resiz() {
    if (screen.width < 769) {
        var element = document.querySelector("body");
        element.classList.remove("sidebar-toggled");
    }
}

function openMoreFilter() {
    var omf = document.getElementById("more_filter");
    omf.classList.add("in");
}

function closeMoreFilter() {
    var cls = document.getElementById("more_filter");
    cls.classList.remove("in");
}

if ($('#more_filter').length > 0) {
    $(document).on('mouseup', function(e) {
        var container = $("#more_filter");
        var searchField = $(".bs-searchbox");
        var select2Field = $("#bs-select-2");
        var selectField = $(".bs-container");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0 && !searchField.is(e.target) && searchField.has(e.target).length === 0 && !select2Field.is(e.target) && select2Field.has(e.target).length === 0 && selectField.has(e.target).length === 0) {
            closeMoreFilter()
        }
    });
}

function openMobileMenu() {
    var omm = document.getElementById("mobile_menu_collapse");
    omm.classList.add("toggled");

    var omm1 = document.getElementById("mobile_close_panel");
    omm1.classList.add("toggled");
}

function closeMobileMenu() {
    var cmm = document.getElementById("mobile_menu_collapse");
    cmm.classList.remove("toggled");

    var cmm1 = document.getElementById("mobile_close_panel");
    cmm1.classList.remove("toggled");
}

function openAdminDashboard() {
    var oad1 = document.getElementById("mob-admin-dash");
    oad1.classList.add("in");

    var oad2 = document.getElementById("close-admin-overlay");
    oad2.classList.add("in");
}

var el = document.getElementById('close-admin-overlay');
if (el) {
    el.addEventListener("click", closeAdminDashboard);
}

var el = document.getElementById('close-admin');
if (el) {
    el.addEventListener("click", closeAdminDashboard);
}

function closeAdminDashboard() {
    var cad1 = document.getElementById("mob-admin-dash");
    cad1.classList.remove("in");

    var cad2 = document.getElementById("close-admin-overlay");
    cad2.classList.remove("in");
}


function closeProjectSidebar() {
    var cps1 = document.getElementById("mob-project-menu");
    cps1.classList.remove("in");

    var cps2 = document.getElementById("close-project-overlay");
    cps2.classList.remove("in");
}
function msgTabs(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";

    document.getElementById('msgContentRight').className += ' d-block';
}



function rtl() {
    var rtl = document.querySelector("body");
    rtl.classList.toggle("rtl");
}


// Sidebar open close
$("#sidebarToggle").on("click", function() {
    if ($("body").hasClass("sidebar-toggled")) {
        localStorage.setItem("mini-sidebar", "yes");
    } else {
        localStorage.setItem("mini-sidebar", "no");
    }
});




