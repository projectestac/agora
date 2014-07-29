
// Global variables
var colorset;
var color2, color3, color4, color5;

function changeColors() {
    colorProfile = colorset.value;
    
    if(colorProfile == 'grana') {
        color2.value = '#AC2013';
        color3.value = '#FFFFFF';
        color4.value = '#303030';
        color5.value = '#AC2013';
    }
    else if(colorProfile == 'coral') {
        color2.value = '#FF4444';
        color3.value = '#FFFFFF';
        color4.value = '#00BBBB';
        color5.value = '#008888';
    }
    else if(colorProfile == 'or') {
        color2.value = '#E99B00';
        color3.value = '#FFFFFF';
        color4.value = '#0B3D41';
        color5.value = '#145C61';
    }
    else if(colorProfile == 'llima') {
        color2.value = '#5A6E31';
        color3.value = '#FFFFFF';
        color4.value = '#333333';
        color5.value = '#74AB00';
    }
    else if(colorProfile == 'tardor') {
        color2.value = '#E68804';
        color3.value = '#FFFFFF';
        color4.value = '#344D00';
        color5.value = '#4E7104';
    }
    else if(colorProfile == 'nostalgia') {
        color2.value = '#457FB9';
        color3.value = '#FFFFFF';
        color4.value = '#457FB9';
        color5.value = '#457FB9';
    }


    var color2pick = color2.parentNode.getElementsByClassName("currentcolour")[0];
    var color3pick = color3.parentNode.getElementsByClassName("currentcolour")[0];
    var color4pick = color4.parentNode.getElementsByClassName("currentcolour")[0];
    var color5pick = color5.parentNode.getElementsByClassName("currentcolour")[0];
    
    color2pick.style.backgroundColor = color2.value;
    color3pick.style.backgroundColor = color3.value;
    color4pick.style.backgroundColor = color4.value;
    color5pick.style.backgroundColor = color5.value;
}


function changeToPersonalized() {
    colorset.value = 'personalitzat';
    color2pick.style.backgroundColor = color2.value;
    color3pick.style.backgroundColor = color3.value;
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
        color3 = document.getElementById('id_s_theme_xtec2_color3');
        color4 = document.getElementById('id_s_theme_xtec2_color4');
        color5 = document.getElementById('id_s_theme_xtec2_color5');

        color2.addEventListener('input', changeToPersonalized, false);
        color3.addEventListener('input', changeToPersonalized, false);
        color4.addEventListener('input', changeToPersonalized, false);
        color5.addEventListener('input', changeToPersonalized, false);

        colorset.addEventListener('change', changeColors, false);
    }
}

