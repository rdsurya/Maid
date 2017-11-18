/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function getJson(str) {
    try {
        var leJson = JSON.parse(str);
    } catch (e) {
        return {valid: false};
    }
    return {value: leJson, valid: true};
}

function ANL_getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function ANL_getUniqueColors(t)
{
    t = parseInt(t);
    if (t < 2) {
//                throw new Error("'t' must be greater than 1.");
        var err = [];
        err.push(ANL_hsvToRgb(360, 200, 100));
        return err;
    }


    // distribute the colors evenly on
    // the hue range (the 'H' in HSV)
    var i = 360 / (t - 1);

    // hold the generated colors
    var r = [];
    var sv = 70;
    for (var x = 0; x < t; x++) {
        // alternate the s, v for more
        // contrast between the colors.
        sv = sv > 90 ? 70 : sv + 10;
        r.push(ANL_hsvToRgb(i * x, sv, sv));
    }
    return r;
}

function ANL_hsvToRgb(h, s, v) {
    var r, g, b;
    var i;
    var f, p, q, t;

    // Make sure our arguments stay in-range
    h = Math.max(0, Math.min(360, h));
    s = Math.max(0, Math.min(100, s));
    v = Math.max(0, Math.min(100, v));

    // We accept saturation and value arguments from 0 to 100 because that's
    // how Photoshop represents those values. Internally, however, the
    // saturation and value are calculated from a range of 0 to 1. We make
    // That conversion here.
    s /= 100;
    v /= 100;

    if (s == 0) {
        // Achromatic (grey)
        r = g = b = v;
        return [Math.round(r * 255), Math.round(g * 255), Math.round(b * 255)];
    }

    h /= 60; // sector 0 to 5
    i = Math.floor(h);
    f = h - i; // factorial part of h
    p = v * (1 - s);
    q = v * (1 - s * f);
    t = v * (1 - s * (1 - f));

    switch (i) {
        case 0:
            r = v;
            g = t;
            b = p;
            break;

        case 1:
            r = q;
            g = v;
            b = p;
            break;

        case 2:
            r = p;
            g = v;
            b = t;
            break;

        case 3:
            r = p;
            g = q;
            b = v;
            break;

        case 4:
            r = t;
            g = p;
            b = v;
            break;

        default: // case 5:
            r = v;
            g = p;
            b = q;
    }

    return [Math.round(r * 255), Math.round(g * 255), Math.round(b * 255)];
}