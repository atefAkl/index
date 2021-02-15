/*global document, window, $, XMLHttpRequest, getCookie, setCookie, deleteCookie*/
$('table.data').DataTable(
    {
        "aaSorting": [],
        "stateSave": true
    }
);
var i = 0, ii;
$('a.menu_switch').click(function (evt) {
    'use strict';
    evt.preventDefault();
    if ($(this).attr('data-menu-status') === 'false') {
        $(this).removeClass('no_animation');
        $('nav.main_navigation').removeClass('no_animation');
        $('div.action_view').removeClass('no_animation');
        $(this).attr('data-menu-status', 'true');
        $(this).addClass('opened');
        $('nav.main_navigation').addClass('opened');
        $('div.action_view').addClass('collapsed');
        if (getCookie('menu_opened') === "") {
            setCookie('menu_opened', true, 180, 'mvcapp.com');
        }
    } else {
        $(this).attr('data-menu-status', 'false');
        $(this).removeClass('opened');
        $('nav.main_navigation').removeClass('opened');
        $('div.action_view').removeClass('collapsed');
        deleteCookie('menu_opened', 'mvcapp.com');
    }
});

$('span.left').on('click', function () {
    'use strict';
    $('.galleryContainer').css('left', function () {
        var lft = $('.galleryContainer').css('left').replace(/px/gi, '');
        if (lft > -3300) {
            return lft - 660 + 'px';
        } else {
            return '-3300px';
        }
    });
});

// Animating Gallery Items to the right
$('span.right').on('click', function () {
    'use strict';
    $('.galleryContainer').css('left', function () {
        var lft = $('.galleryContainer').css('left').replace(/px/gi, '');
        if (lft >= 0) {
            return '0px';
        } else {
            return parseInt(lft, 10) + 660 + 'px';
        }
    });
});

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;
var social = document.getElementById('social');
document.getElementById('home');
document.getElementById('aboutUs');
function myFunction() {
    'use strict';
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
        social.classList.add('popout');
    } else {
        navbar.classList.remove("sticky");
        social.classList.remove('popout');
    }
}


window.onscroll = function () {
    'use strict';
    myFunction();
};


/*var ddToggleItems = ['#projects', '#products', '#services']*/
$('.ddToggle').on('click', function () {
    'use strict';
    var target = $(this).attr('data-toggle');
    $('ul:not(' + target + ')').removeClass('slided');
    $(target).toggleClass('slided');
});

$('form.appForm input:not(.no_float)').on('focus', function () {
    'use strict';
    $(this).parent().find('label').addClass('floated');
}).on('blur', function () {
    'use strict';
    if ($(this).val() === '') {
        $(this).parent().find('label').removeClass('floated');
    }
});

$('div.radio_button, div.checkbox_button, label.radio span, label.checkbox span, a.language_switch.user').click(function (evt) {
    'use strict';
    evt.stopPropagation();
});

// setTimeout(function()
// {
//     $('p.message').fadeOut();
// }, 5000);

(function () {
    'use strict';
    var closeMessageButtons = document.querySelectorAll('p.message a.closeBtn');
    for (i = 0, ii = closeMessageButtons.length; i < ii; i += 1) {
        closeMessageButtons[i].addEventListener('click', function (evt) {
            evt.preventDefault();
            this.parentNode.parentNode.removeChild(this.parentNode);
        }, false);
    }
})();

$(document).click(function () {
    $('ul.user_menu ').hide();
});

$('a.language_switch.user').click(function (evt) {
    evt.preventDefault();
    $('ul.user_menu').toggle();
})

$('li.submenu > a').click(function(evt) {
    'use strict';
	evt.preventDefault();
	$('.arrow').html('&#8658;');
	$(this).parent().siblings().removeClass('selected');
	$(this).parent().addClass('selected');
	$('li.active a span.arrow').html('&#8659;');
});

(function()
{
    var userNameField = document.querySelector('input[name=Username]');
    if(null !== userNameField) {
        userNameField.addEventListener('blur', function()
        {
            var req = new XMLHttpRequest();
            req.open('POST', 'http://www.mvcapp.com/users/checkuserexistsajax');
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            req.onreadystatechange = function()
            {
                var iElem = document.createElement('i');
                if(req.readyState == req.DONE && req.status == 200) {
                    if(req.response == 1) {
                        iElem.className = 'fa fa-times error';
                    } else if(req.response == 2) {
                        iElem.className = 'fa fa-check success';
                    }
                    var iElems = userNameField.parentNode.childNodes;
                    for ( var i = 0, ii = iElems.length; i < ii; i++ )
                    {
                        if(iElems[i].nodeName.toLowerCase() == 'i') {
                            iElems[i].parentNode.removeChild(iElems[i]);
                        }
                    }
                    userNameField.parentNode.appendChild(iElem);
                }
            }

            req.send("Username=" + this.value);
        }, false);
    }
})();