
// Global variables
var colorset;
var color2, color4, color5;

var blocks_shown = true;
var old_main_post_class = '';
var old_main_pre_class = '';

function changeColors() {
    colorProfile = colorset.value;

    if(colorProfile == 'grana') {
        color2.value = '#AC2013';
        color4.value = '#303030';
        color5.value = '#AC2013';
    }
    else if(colorProfile == 'coral') {
        color2.value = '#FF4444';
        color4.value = '#00BBBB';
        color5.value = '#008888';
    }
    else if(colorProfile == 'or') {
        color2.value = '#E99B00';
        color4.value = '#0B3D41';
        color5.value = '#145C61';
    }
    else if(colorProfile == 'llima') {
        color2.value = '#5A6E31';
        color4.value = '#333333';
        color5.value = '#74AB00';
    }
    else if(colorProfile == 'tardor') {
        color2.value = '#E68804';
        color4.value = '#344D00';
        color5.value = '#4E7104';
    }
    else if(colorProfile == 'nostalgia') {
        color2.value = '#457FB9';
        color4.value = '#457FB9';
        color5.value = '#457FB9';
    }


    var color2pick = color2.parentNode.getElementsByClassName("currentcolour")[0];
    var color4pick = color4.parentNode.getElementsByClassName("currentcolour")[0];
    var color5pick = color5.parentNode.getElementsByClassName("currentcolour")[0];

    color2pick.style.backgroundColor = color2.value;
    color4pick.style.backgroundColor = color4.value;
    color5pick.style.backgroundColor = color5.value;
}


function changeToPersonalized() {
    colorset.value = 'personalitzat';
    color2pick.style.backgroundColor = color2.value;
    color4pick.style.backgroundColor = color4.value;
    color5pick.style.backgroundColor = color5.value;
}


function xtec2_theme_onload() {

    colorset = document.getElementById('id_s_theme_xtec2_colorset');

    // This condition ensures that this code is only loaded while configuring
    //  xtec2 theme. This is mandatory because if id's don't exist in HTML code,
    //  this code generates a javascript conflict in admin menu.
    if (colorset != null) {
        color2 = document.getElementById('id_s_theme_xtec2_color2');
        color4 = document.getElementById('id_s_theme_xtec2_color4');
        color5 = document.getElementById('id_s_theme_xtec2_color5');

        color2.addEventListener('input', changeToPersonalized, false);
        color4.addEventListener('input', changeToPersonalized, false);
        color5.addEventListener('input', changeToPersonalized, false);

        colorset.addEventListener('change', changeColors, false);
    }
}

function showhideblocks(){
    YUI().use('moodle-theme_bootstrapbase-bootstrap', function(Y) {
        var main_pre = Y.one('#region-bs-main-and-pre');
        if(main_pre == null) main_pre = Y.one('#region-bs-main-and-post');
        var main_post = Y.one('#region-main');

        if(blocks_shown){
            //Hide
            Y.one('#block-region-side-post').hide();
            Y.one('#block-region-side-pre').hide();

            old_main_post_class = main_pre.getAttribute('class');
            main_pre.removeClass(old_main_post_class);
            main_pre.addClass('span12');

            old_main_pre_class = main_post.getAttribute('class');
            main_post.removeClass(old_main_pre_class);
            main_post.addClass('span12');

            Y.one('#showhideblocks').removeClass('collapsed');
            Y.one('#showhideblocks').addClass('expanded');
            Y.one('body').addClass('blocks_collapsed');
        } else {
            //Show
            Y.one('#block-region-side-post').show();
            Y.one('#block-region-side-pre').show();

            main_pre.removeClass('span12');
            main_pre.addClass(old_main_post_class);

            main_post.removeClass('span12');
            main_post.addClass(old_main_pre_class);

            Y.one('#showhideblocks').removeClass('expanded');
            Y.one('#showhideblocks').addClass('collapsed');
            Y.one('body').removeClass('blocks_collapsed');
        }
    });
    blocks_shown = !blocks_shown;
}

