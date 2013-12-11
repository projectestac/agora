
// Global variables
var colorset;
var color1, color2, color3, color4, color5, color6;
var color1pick, color2pick, color3pick, color4pick, color5pick, color6pick;

function changeColors() {
    colorProfile = colorset.value;
    
    if(colorProfile == 'grana') {
        color1.value = '#AC2013';
        color2.value = '#AC2013';
        color3.value = '#FFFFFF';
        color4.value = '#303030';
        color5.value = '#AC2013';
        color6.value = '#D0D0D0';
    }
    else if(colorProfile == 'coral') {
        color1.value = '#FF0011';
        color2.value = '#FF4444';
        color3.value = '#000000';
        color4.value = '#00BBBB';
        color5.value = '#008888';
        color6.value = '#BBEEEE';
    }
    else if(colorProfile == 'or') {
        color1.value = '#CC7000';
        color2.value = '#E99B00';
        color3.value = '#3B2C15';
        color4.value = '#0B3D41';
        color5.value = '#145C61';
        color6.value = '#87BDC1';
    }
    else if(colorProfile == 'llima') {
        color1.value = '#74AB00';
        color2.value = '#5A6E31';
        color3.value = '#DEF5BF';
        color4.value = '#333333';
        color5.value = '#000000';
        color6.value = '#FFEDBA';
    }
    else if(colorProfile == 'tardor') {
        color1.value = '#CD6000';
        color2.value = '#E68804';
        color3.value = '#543414';
        color4.value = '#344D00';
        color5.value = '#4E7104';
        color6.value = '#B3CD7B';
    }
    else if(colorProfile == 'nostalgia') {
        color1.value = '#457FB9';
        color2.value = '#457FB9';
        color3.value = '#E6E4E3';
        color4.value = '#457FB9';
        color5.value = '#457FB9';
        color6.value = '#B3CADB';
    }
    
    color1pick.style.backgroundColor = color1.value;
    color2pick.style.backgroundColor = color2.value;
    color3pick.style.backgroundColor = color3.value;
    color4pick.style.backgroundColor = color4.value;
    color5pick.style.backgroundColor = color5.value;
    color6pick.style.backgroundColor = color6.value;
}


function changeToPersonalized() {
    colorset.value = 'personalitzat';
    color1pick.style.backgroundColor = color1.value;
    color2pick.style.backgroundColor = color2.value;
    color3pick.style.backgroundColor = color3.value;
    color4pick.style.backgroundColor = color4.value;
    color5pick.style.backgroundColor = color5.value;
    color6pick.style.backgroundColor = color6.value;
}


function xtec2_theme_onload() {

    colorset = document.getElementById('id_s_theme_xtec2_colorset');

    // This condition ensures that this code is only loaded while configuring
    //  xtec2 theme. This is mandatory because if id's don't exist in HTML code,
    //  this code generates a javascript conflict in admin menu.
    if (colorset != null) {
        color1 = document.getElementById('id_s_theme_xtec2_color1');
        color2 = document.getElementById('id_s_theme_xtec2_color2');
        color3 = document.getElementById('id_s_theme_xtec2_color3');
        color4 = document.getElementById('id_s_theme_xtec2_color4');
        color5 = document.getElementById('id_s_theme_xtec2_color5');
        color6 = document.getElementById('id_s_theme_xtec2_color6');

        color1pick = color1.parentNode.firstChild.lastChild;
        color2pick = color2.parentNode.firstChild.lastChild;
        color3pick = color3.parentNode.firstChild.lastChild;
        color4pick = color4.parentNode.firstChild.lastChild;
        color5pick = color5.parentNode.firstChild.lastChild;
        color6pick = color6.parentNode.firstChild.lastChild;

        color1.addEventListener('input', changeToPersonalized, false);
        color2.addEventListener('input', changeToPersonalized, false);
        color3.addEventListener('input', changeToPersonalized, false);
        color4.addEventListener('input', changeToPersonalized, false);
        color5.addEventListener('input', changeToPersonalized, false);
        color6.addEventListener('input', changeToPersonalized, false);

        colorset.addEventListener('change', changeColors, false);
    }
}

